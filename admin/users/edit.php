<?php
session_start();
       include "../../app/controlls/users.php";
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/style/php-website-reset.css">
    <link rel="stylesheet" href="../../assets/style/admin.css">
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

    <?php include "../../app/include/header_admin.php"; ?>

    <div class="container">

        <div class="panelandposts">

        <?php require "../../app/include/sidebar.php" ?>

        <div class="posts">

          <div class="posts-button">

          <div class="posts-button-add">
                
                <button class="button-add button"><a class="button-a" href="<?php echo BASE_URL . "admin/users/create.php" ?>">Создать пользователя</a></button>
              
         </div>
  
                <div class="posts-button-add">
                  
                <button class="button-manage button"><a class="button-a" href="<?php echo BASE_URL . "admin/users/index.php" ?>">Управлять пользователями</a></button>
  
        </div>

          </div>

          <h2 class="posts-h2">Редактировать пользователя</h2>

            <div class="add-post">

            <?php include "../../app/helps/errInfo.php" ?>

                <form class="add-post-form" action="edit.php" method="post">

                <input name="id" value="<?= $id ?>" type="hidden">

                <div class="form-group">
    
                    <label for="formGroupExampleInput" style="margin-bottom: 10px; color: white;">Логин</label>
                    <input name="login" value="<?= $username ?>" type="text" class="form-control" id="formGroupExampleInput" placeholder="Ваш логин">

                    </div>

                    <div class="form-group" style="margin-top: 20px;">

                    <label for="exampleInputPassword1" style="margin-bottom: 10px; color: white;">Сбросить Пароль</label>
                    <input name="pass-first" type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">

                    </div>

                    <div class="form-group" style="margin-top: 20px;">

                        <label for="exampleInputPassword1" style="margin-bottom: 10px; color: white;">Повторите пароль</label>
                        <input name="pass-second" type="password" class="form-control" id="exampleInputPassword2" placeholder="Password">

                    </div>

                    <input class="publish-input" type="checkbox" name="admin" value="1" style="margin-top: 25px;">
                    <label class="publish">Admin</label>

                    <div class="col-12 col-div">

                        <button name="update-user" class="btn btn-primary" type="submit">Обновить</button>
                    
                    </div>

                </form>
              
            </div>

        </div>

        </div>

    </div>
     
    <?php require "../../app/include/footer.php"; ?>