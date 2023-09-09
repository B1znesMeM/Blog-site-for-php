<?php
include $_SERVER['DOCUMENT_ROOT'] . "/app/controlls/commentaries.php";
?>

<!doctype html>
<html lang="ru">
<head>
<meta charset="utf8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link rel="stylesheet" href="../../assets/style/php-website-reset.css">
<link rel="stylesheet" href="../../assets/style/admin.css">
<title>php-website</title>
<script src="https://kit.fontawesome.com/5eae26e629.js" crossorigin="anonymous"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js" defer></script>
<script src="../../assets//script/php-website-script.js" defer></script>
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

   <h2 class="posts-h2">Редактирование комментария</h2>

     <div class="add-post">

     <!-- Вывод ошибок -->
     <?php include "../../app/helps/errInfo.php" ?>

         <form action="edit.php" class="add-post-form" method="post">

            <input name="id" type="hidden" value="<?= $id; ?>">

             <div class="col">

                 <input value="<?= $email ?>" name="email" type="email" disabled class="form-control" placeholder="Название" aria-label="First name">
             
             </div>

             <div class="col col-div">

                 <label for="editor" class="form-label">Содержимое комментария</label>
                 
                 <textarea name="content" id="editor" class="form-control" id="content" rows="6"><?= $text1; ?></textarea>
            
             </div>

             <div class="col-12 col-div">

                <?php if($pub) $checked = 'checked'; else $checked = ""; ?>
                <input name="publish" class="form-check-input" type="checkbox" <?= $checked; ?>>
                <label class="form-check-label" for="flexCheckChecked" style="color: white;">
                    Publish
                </label>
                     
             </div>

             <div class="col-12 col-div">

                 <button name="edit_comment" class="btn btn-primary" type="submit">Изменить комментарий</button>
             
             </div>

         </form>
       
     </div>

 </div>

 </div>

</div>

<?php require "../../app/include/footer.php"; ?>