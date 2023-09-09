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

          <h2 class="posts-h2">Управление категориями</h2>

            <div class="title-table">
                
            <?php

                // tt($topics);
                // exit();

            ?>

                <div class="table-name-id table-name">ID</div>
                <div class="table-name-title table-name">Название</div>
                <div class="table-name-edit table-name">Редактир.</div>
                <div class="table-name-delete table-name">Удалить</div>

            </div>

            <?php foreach ($topics as $key => $topic): ?>

            <div class="post">

                <div class="id table-name-id table-name"><?= $key + 1; ?></div>
                <div class="title table-name-title table-name"><?= $topic['name']; ?></div>
                <div class="edit table-name-edit table-name"><a class="edit__a" href="edit.php?id=<?= $topic['id']; ?>">edit</a></div>
                <div class="delete table-name-delete table-name"><a class="delete__a" href="edit.php?del_id=<?= $topic['id']; ?>">delete</a></div>

            </div>

            <?php endforeach; ?>

        </div>

        </div>

    </div>
     
    <?php require "../../app/include/footer.php"; ?>