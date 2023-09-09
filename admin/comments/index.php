<?php
       include  $_SERVER['DOCUMENT_ROOT'] . "/app/controlls/commentaries.php";
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

        <?php 
            require "../../app/include/sidebar.php" 
        ?>

        <div class="posts">

          <h2 class="posts-h2">Управление комментариями</h2>

          <div class="table-div">

            <div class="title-table">

                <div class="table-name-id table-name">ID</div>
                <div class="table-name-title table-name">Текст</div>
                <div class="table-name-admin table-name">Автор</div>
                <div class="table-name-delete table-name">Изменить</div>
                <div class="table-name-delete table-name">Удалить</div>
                <div class="table-name-nopublic table-name">В черновик</div>

            </div>

          <?php foreach ($commentsForAdm as $key => $comment): ?>

            <div class="post">

                <div class="id table-name-id table-name"><?= $comment['id']; ?></div>
                <div class="title table-name-title table-name" style="width: 200px;"><?= substr($comment['comment'], 0 , 150); ?></div>

                <?php 
                
                  $user = $comment['email'];
                  $user = explode("@" , $user);
                  $user = $user[0];

                ?>
                <div class="admin table-name-admin table-name" style="width: 250px;"><?= $user . "@"; ?></div>
                <div class="edit table-name-edit table-name"><a class="edit__a" href="edit.php?id=<?= $comment['id'] ?>">edit</a></div>
                <div class="delete table-name-delete table-name"><a class="delete__a" href="edit.php?delete_id=<?= $comment['id'] ?>">delete</a></div>
                <?php if ($comment['status']): ?>
                <div class="status table-name-no-public table-name"><a class="status__a" href="edit.php?publish=0&pub_id=<?= $comment['id'] ?>">unpublish</a></div>
                <?php else: ?>
                  <div class="status table-name-no-public table-name"><a class="status__a" href="edit.php?publish=1&pub_id=<?= $comment['id'] ?>">publish</a></div>
                <?php endif; ?>

            </div>

            <?php endforeach; ?>

          </div>

        </div>

        </div>

    </div>
     
    <?php require "../../app/include/footer.php"; ?>