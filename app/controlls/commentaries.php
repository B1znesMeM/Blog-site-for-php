
<?php
// Controller
include_once $_SERVER['DOCUMENT_ROOT'] .  "/app/database/db.php";
include $_SERVER['DOCUMENT_ROOT'] . "/path.php";
$commentsForAdm = selectAll('comments');

$page = $_GET['post'];
$email = '';
$comment = '';
$errMsg = [];
$status = 0;
$comments = [];


// Код для формы создания комментария
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['goComment'])){


    $email = trim($_POST['email']);
    $comment = trim($_POST['comment']);


    if($email === '' || $comment === ''){
        array_push($errMsg, "Не все поля заполнены!");
    }elseif (mb_strlen($comment, 'UTF8') < 10){
        array_push($errMsg, "Комментарий должен быть длинее 10 символов");
    }else{
        $user = selectOne('website', ['email' => $email]);
        if ($user['email'] == $email && $user['admin'] == 1){
            $status = 1;
        }

        $comment = [
            'status' => $status,
            'page' => $page,
            'email' => $email,
            'comment' => $comment
        ];

        $comment = insert('comments', $comment);
        $comments = selectAll('comments', ['page' => $page, 'status' => 1] );

    }
}else{
    $email = '';
    $comment = '';
    $comments = selectAll('comments', ['page' => $page, 'status' => 1] );

}

//Удаление комментариев
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){

    $id = $_GET['delete_id'];
    delete('comments', $id);
    header('location: ' . BASE_URL . "admin/comments/index.php");
    exit();
}

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){

    $id = $_GET['pub_id'];
    $publish = $_GET['publish'];

    $postID = update('comments', $id , ['status' => $publish] );

    header('location: ' . BASE_URL . "/admin/comments/index.php");
}

// Статус опубоиковать или снять публикацию
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])){

    $oneComment = selectOne('comments', ['id' => $_GET['id']]);

    $id = $oneComment['id'];
    $email = $oneComment['email'];
    $text1 = $oneComment['comment'];
    $pub = $oneComment['status'];
}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_comment'])){

    $id = $_POST['id'];
    $text = trim($_POST['comment']);

    $publish = isset($_POST['publish']) ? 1 : 0;

    if ($text === ''){

        array_push($errMsg, "Комментарий не иммет содержимого");

    }
    else if (mb_strlen($text, 'UTF8') < 10){
        array_push($errMsg, "Количество символов меньше 10-ю");
    }
    else{
        $comm = [
            'comment' => $text,
            'status' => $publish,
        ];

        $comment = update('comments', $id, $comm);
        header('location: ' . BASE_URL . "admin/comments/index.php");
        }
    }
else{
    $text = trim($_POST['comment']);
    $publish = isset($_POST['publish']) ? 1 : 0;
}