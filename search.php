<?php
      include "./path.php";
      include $_SERVER['DOCUMENT_ROOT'] . "/app/database/db.php";
      if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search-term'])){
        $posts = seacrhInTitleAndContent($_POST['search-term'], 'posts', 'website');
      }
 ?>

<!doctype html>
<html lang="ru">
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

      <div class="container">

      <h3 class="title" style="font-size: 24px; text-align: center; margin: 30px">Результаты поиска</h3>

        <div class="post-and-search-div">

          <section class="post" style="margin-top: 7.3vh;">

          <?php foreach ($posts as $post): ?>

            <div class="post-block">
  
              <img class="post-block__image" src="<?= BASE_URL . "assets/image__php-website/posts/" . $post['img']; ?>" alt="<?= $post['title']; ?>">
  
              <div class="post-block__text">
  
                <h3 class="post-block__text-title"><a class="post-block__text-title-a" href="<?= BASE_URL . 'single.php?post=' . $post['id']; ?>"><?= substr($post['title'], 0 , 120) . '...'; ?></a></h3>

                <p class="author"><?= $post['username']; ?></p>
  
                <p class="post-block__text-paragraph"> <?= substr($post['content'], 0 , 150); ?></p>
  
              </div>
  
            </div>

            <?php endforeach; ?>
  
          </section>

        </div>

      </div>

      <?php require "./app/include/footer.php" ?>