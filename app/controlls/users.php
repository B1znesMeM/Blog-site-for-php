<?php
include __DIR__ . "../../database/db.php";

$errMsg = [];

$users = selectAll('website');

//Код для регистрации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-reg'])){
    $admin = 0;
    $login = trim($_POST['login']);
    $mail = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if ($login === '' || $mail === '' || $passF === ''){

        $errMsg = "Не все поля заполнены!";

    }
    else if (mb_strlen($login, 'UTF8') < 2){
        $errMsg = "Логин должен быть более 2-х символов";
    }
    else if ($passF !== $passS){
        $errMsg = 'Пароли в обеих полях должны соответсвовать';
    }
    else{
        $existence = selectOne('website', ['email' => $mail]);
        if ($existence !== false) {
            $errMsg = 'Такой пользователь существует';
        }
        else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        $post = [
            'admin' => $admin,
            'username' => $login,
            'email' => $mail,
            'password' => $pass
        ];
        $id = insert('website', $post);
        $user = selectOne('website', ['id' => $id]);

        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];

        if ($_SESSION['admin']){
            header('Location: ' . BASE_URL . "admin/admin.php");
        }else{
        header("Location: " . "index.php");
        }
        }
    }

}
else{

    $login = '';
    $mail = '';

}

//Код для формы авторизации
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['button-log'])){

    $mail = trim($_POST['email']);
    $pass = trim($_POST['password']);

    if ($mail === '' || $passF === ''){

        $errMsg = "Не все поля заполнены!";

    }
    else{
        $existence = selectOne('website', ['email' => $mail]);
        
        if($existence && password_verify($pass, $existence['password'])){
            $_SESSION['id'] = $existence['id'];
            $_SESSION['login'] = $existence['username'];
            $_SESSION['admin'] = $existence['admin'];

            if ($_SESSION['admin']){
                header('Location: ' . "/admin/post/index.php");
            }else{
                header("Location: " . "index.php");
            }
        }
        else{
            $errMsg = 'Почта либо пароль введены неверно';
        }
    }
}else{
    $email = '';
}

//Код добавления пользователя в админке
if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['create-user'])){

    $admin = 0;
    $login = trim($_POST['login']);
    $mail = trim($_POST['email']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    if ($login === '' || $mail === '' || $passF === ''){

        array_push($errMsg, "Не все поля заполнены!");

    }
    else if (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Логин должен быть более 2-х символов");
    }
    else if ($passF !== $passS){
        array_push($errMsg, 'Пароли в обеих полях должны соответсвовать');
    }
    else{
        $existence = selectOne('website', ['email' => $mail]);
        if ($existence !== false) {
            array_push($errMsg, 'Такой пользователь существует');
        }
        else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);

        if(isset($_POST['admin'])){
            $admin = 1;
        }

        $user = [
            'admin' => $admin,
            'username' => $login,
            'email' => $mail,
            'password' => $pass
        ];
        $id = insert('website', $user);
        $user = selectOne('website', ['id' => $id]);

        $_SESSION['id'] = $user['id'];
        $_SESSION['login'] = $user['username'];
        $_SESSION['admin'] = $user['admin'];

        if ($_SESSION['admin']){
            header('Location: ' . "/admin/users/index.php");
        }else{
        header("Location: " . "index.php");
        }
        }
    }

}
else{

    $login = '';
    $mail = '';

}

// Удаление пользователя
if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['delete_id'])){

    $id = $_GET['delete_id'];
    delete('website', $id);
    header('location: ' . "/admin/users/index.php");
    exit();
}

/* Редактирование  пользователя */  

if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['edit_id'])){

    $user = selectOne('website', ['id' => $_GET['edit_id']]);

    $id = $user['id'];
    $admin = $user['admin'];
    $username = $user['username'];
    $mail = $user['email'];

}

if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update-user'])){

    $id = $_POST['id'];
    $login = trim($_POST['login']);
    $passF = trim($_POST['pass-first']);
    $passS = trim($_POST['pass-second']);

    $admin = isset($_POST['admin']) ? 1 : 0;

    if ($login === ''){

        array_push($errMsg, "Не все поля заполнены!");

    }
    else if (mb_strlen($login, 'UTF8') < 2){
        array_push($errMsg, "Название логина должно быть названа из более 2-х символов");
    }
    else if ($passF !== $passS) {
        array_push($errMsg, "Пароли должны соответствовать");
    }
    else{
        $pass = password_hash($passF, PASSWORD_DEFAULT);
        $user = [
            'admin' => $admin,
            'username' => $login,
            'password' => $pass
        ];

        $user = update('website', $id, $user);
        header('location: ' . "/admin/users/index.php");
        }
    }
else{
    $login = '';
}

// if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['pub_id'])){

//     $id = $_GET['pub_id'];
//     $publish = $_GET['publish'];

//     $postID = update('posts', $id , ['status' => $publish] );

//     header('location: ' . BASE_URL . "/admin/post/index.php");
// }
