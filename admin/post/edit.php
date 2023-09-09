<?php
include "../../app/controlls/posts.php";
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

   <h2 class="posts-h2">Редактирование записи</h2>

     <div class="add-post">

     <!-- Вывод ошибок -->
     <?php include "../../app/helps/errInfo.php" ?>

         <form action="edit.php" class="add-post-form" method="post" enctype="multipart/form-data">

            <input name="id" type="hidden" value="<?= $id; ?>">

             <div class="col">

                 <input value="<?= $post['title'] ?>" name="title" type="text" class="form-control" placeholder="Название" aria-label="First name">
             
             </div>

             <div class="col col-div">

                 <label for="editor" class="form-label">Содержимое записи</label>
                 
                 <textarea name="content" id="editor" class="form-control" id="content" rows="6"><?= $post['content'] ?></textarea>
            
             </div>

             <div class="input-group col col-div">

                 <input name="img" type="file" class="form-control" id="inputGroupFile02">

                 <label class="input-group-text" for="inputGroupFile02">Upload</label>
                 
             </div>

             <select name="topic" class="form-select col-div" aria-label="Default select example">

                 <?php foreach ($topics as $key => $topic): ?>
                     
                     <option value="<?= $topic['id']; ?>"><?= $topic['name']; ?></option>

                 <?php endforeach; ?>

             </select>

             <div class="col-12 col-div">

                <?php if (!empty($publish) && $publish == 0): ?>

                 <input class="publish-input" type="checkbox" name="publish" checked>
                 <label class="publish">Publish</label>
                <?php else: ?> 

                 <input class="publish-input" type="checkbox" name="publish">
                 <label class="publish">Publish</label>
                <?php endif; ?>
                     
             </div>

             <div class="col-12 col-div">

                 <button name="edit_post" class="btn btn-primary" type="submit">Сохранить запись</button>
             
             </div>

         </form>
       
     </div>

 </div>

 </div>

</div>

<?php require "../../app/include/footer.php"; ?>