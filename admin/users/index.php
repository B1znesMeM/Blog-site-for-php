<?php
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

          <h2 class="posts-h2">Управление пользователями</h2>

          <div class="table-div">

            <div class="title-table">

                <div class="table-name-id table-name">ID</div>
                <div class="table-name-title table-name">Логин</div>
                <div class="table-name-email table-name">Email</div>
                <div class="table-name-admin table-name">Роль</div>
                <div class="table-name-edit table-name">Редактир.</div>
                <div class="table-name-delete table-name">Удалить</div>

            </div>

            <?php foreach ($users as $key => $user): ?>

            <div class="post">

                <div class="id table-name-id table-name"><?= $user['id']; ?></div>
                <div class="title table-name-title table-name"><?= $user['username'] ?></div>
                <div class="email table-name-email table-name"><?= $user['email'] ?></div>

                <?php if ($user['admin'] == 1 ): ?>

                <div class="admin table-name-admin table-name">Admin</div>
                <?php else: ?>
                    <div class="admin table-name-admin table-name">User</div>
                <?php endif; ?>
                    <div class="edit table-name-edit table-name"><a class="edit__a" href="edit.php?edit_id=<?= $user['id']; ?>">edit</a></div>
                <div class="delete table-name-delete table-name"><a class="delete__a" href="index.php?delete_id=<?= $user['id']; ?>">delete</a></div>

            </div>

            <?php endforeach; ?>

          </div>

        </div>

        </div>

    </div>
     
    <?php require "../../app/include/footer.php"; ?>