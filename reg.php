<?php 
include __DIR__ . "./app/controlls/users.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/style/php-website-reset.css">
    <link rel="stylesheet" href="../assets/style/php-website-style.css">
    <title>php-website</title>
    <script src="https://kit.fontawesome.com/5eae26e629.js" crossorigin="anonymous"></script>
    <style>
        body { 
            -ms-user-select: none; 
            -moz-user-select: none; 
            -webkit-user-select: none; 
            user-select: none; 
        }
    </style>
    </head>
    <body>
    <?php require "./app/include/header.php"; ?>
            <!-- FORM -->

            <div class="container-form">

                <form class="form" method="post" action="reg.php">

                    <h1 class="form-h1" style="font-size: 30px; text-align: center; margin-bottom: 30px;">Форма регистрации</h1>

                    <div>

                        <p class="err"><?= $errMsg ?></p>

                    </div>

                    <div class="form-group">
    
                        <label for="formGroupExampleInput" style="margin-bottom: 10px;">Ваш логин</label>
                        <input name="login" value="<?= $login ?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Ваш логин">
      
                      </div>

                    <div class="form-group" style="margin-top: 20px;">
    
                      <label for="exampleInputEmail1" style="margin-bottom: 10px;">Email адрес</label>
                      <input name="email" value="<?= $mail ?>" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    
                    </div>
    
                    <div class="form-group" style="margin-top: 20px;">
    
                      <label for="exampleInputPassword1" style="margin-bottom: 10px;">Пароль</label>
                      <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    
                    </div>

                    <div class="form-group" style="margin-top: 20px;">
    
                        <label for="exampleInputPassword1" style="margin-bottom: 10px;">Повторите пароль</label>
                        <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
      
                      </div>
      
    
                    <div class="form-check" style="margin: 20px; margin-left: 0px;" >
    
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
    
                    </div>
    
                    <button name="button-reg" type="submit" class="btn btn-primary" style="background-color: #003532; border: 1px solid white;">Отправить</button>

                    <a class="brn-a" href="/log.php" style="margin-left: 20px; text-decoration: underline; color: whitesmoke;">Войти</a>
    
                  </form>

            </div>

            <!-- END FROM -->

<?php include("./app/include/footer.php")?>