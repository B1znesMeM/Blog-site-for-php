<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'] . "/path.php";
include $_SERVER['DOCUMENT_ROOT'] . "/app/database/db.php";

if(!$_SESSION){
    header('location: ' . BASE_URL . "log.php"); 
}

$errMsg = [];
$id = '';
$title = '';
$content = '';
$topic = '';
$img = '';

$topics = selectAll('topics');
$posts = selectAll('posts');
$postsAdm = selectAllFromPostsWithUsers('posts', 'website');

//Код для формы создания записи
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_post'])){

    if(!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\image__php-website\posts\\" . $imgName;

        if(strpos($fileType, 'image') === false){
            array_push($errMsg, 'Можно загружать только изображения');
        }

        $result = move_uploaded_file($fileTmpName, $destination);

        if($result){
            $_POST['img'] = $imgName;
        }
        else{
            array_push($errMsg, "Ошибка загрузки изображения");
        }

    }
    else{
        array_push($errMsg, "Ошибка получения изображения");
    }

    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if ($title === '' || $content === '' || $topic === ''){

        array_push($errMsg, "Не все поля заполнены!");

    }
    else if (mb_strlen($title, 'UTF8') < 7){
        array_push($errMsg, "Название статьи должно быть названа из более 7-ми символов");
    }
    else{
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];

        $post = insert('posts', $post);
        $post = selectOne('posts', ['id' => $id]);
        header('location: ' . BASE_URL . "admin/post/index.php");
        }
    }
else{
    $title = '';
    $content = '';
    $publish = '';
}


/* Редактирование категории */

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $post = selectOne('posts', ['id' => $_GET['id']]);

    $id = $post['id'];
    $title = $post['title'];
    $content = $post['content'];
    $topic = $post['id_topic'];
    $publish = $post['status'];

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_post'])){

    $id = $_POST['id'];
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $topic = trim($_POST['topic']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if(!empty($_FILES['img']['name'])){
        $imgName = time() . "_" . $_FILES['img']['name'];
        $fileTmpName = $_FILES['img']['tmp_name'];
        $fileType = $_FILES['img']['type'];
        $destination = ROOT_PATH . "\assets\image__php-website\posts\\" . $imgName;

        if(strpos($fileType, 'image') === false){
            array_push($errMsg, 'Можно загружать только изображения');
        }

        $result = move_uploaded_file($fileTmpName, $destination);

        if($result){
            $_POST['img'] = $imgName;
        }
        else{
            array_push($errMsg, "Ошибка загрузки изображения");
        }

    }
    else{
        array_push($errMsg, "Ошибка получения изображения");
    }

    if ($title === '' || $content === '' || $topic === ''){

        array_push($errMsg, "Не все поля заполнены!");

    }
    else if (mb_strlen($title, 'UTF8') < 7){
        array_push($errMsg, "Название статьи должно быть названа из более 7-ми символов");
    }
    else{
        $post = [
            'id_user' => $_SESSION['id'],
            'title' => $title,
            'content' => $content,
            'img' => $_POST['img'],
            'status' => $publish,
            'id_topic' => $topic
        ];

        $post = update('posts', $id, $post);
        header('location: ' . BASE_URL . "admin/post/index.php");
        }
    }
else{
    $title = '';
    $content = '';
    $publish = isset($_POST['publish']) ? 1 : 0;
    $topic = $_POST['id_topic'];
}

// Статус опубоиковать или снять публикацию
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){

    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postID = update('posts', $id , ['status' => $publish] );

    header('location: ' . BASE_URL . "/admin/post/index.php");
}

// // Удаление статьи
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){

    $id = $_GET['delete_id'];
    delete('posts', $id);
    header('location: ' . BASE_URL . "/admin/post/index.php");
    exit();
}
