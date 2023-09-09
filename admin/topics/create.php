<?php
       include "../../path.php";
       include "../../app/controlls/topics.php";
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
                
                <button class="button-add button"><a class="button-a" href="<?php echo BASE_URL . "admin/topics/create.php" ?>">Создать категорию</a></button>
              
            </div>
  
                <div class="posts-button-add">
                  
                <button class="button-manage button"><a class="button-a" href="<?php echo BASE_URL . "admin/topics/index.php" ?>">Управлять категориями</a></button>
  
            </div>

          </div>

          <h2 class="posts-h2">Создать категорию</h2>

            <div class="add-post">

            <div>

                <p class="err"><?= $errMsg ?></p>

            </div>

                <form class="add-post-form" action="create.php" method="post">

                    <div class="col">

                        <input name="name" value="<?= $name ?>" type="text" class="form-control" placeholder="Имя категорию" aria-label="Имя категорию">
                    
                    </div>

                    <div class="col col-div">

                        <label for="content" class="form-label">Описание категории</label>
                        
                        <textarea name="description" class="form-control" id="content" rows="3"><?= $description ?></textarea>
                   
                    </div>

                    <div class="col-12 col-div">

                        <button name="topic-create" class="btn btn-primary" type="submit">Сохранить категорию</button>
                    
                    </div>

                </form>
              
            </div>

        </div>

        </div>

    </div>
     
    <?php require "../../app/include/footer.php"; ?>