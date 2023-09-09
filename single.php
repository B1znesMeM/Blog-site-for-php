<?php
       include "app/controlls/topics.php";
       $post = selectPostFromPostsWithUsersOnSingle('posts', 'website' , $_GET['post']);
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

    <?php require "./app/include/header.php";?>

      <div class="container">

        <div class="post-and-search-div">

          <section class="single-post">

            <div class="single-post-block">

                <h3 class="single-post-block__text-title"><?php echo $post['title']; ?></h3>
  
              <img class="single-post-block__image" src="<?= BASE_URL . "assets/image__php-website/posts/" . $post['img']; ?>" alt="<?= $post['title']; ?>">

              <div class="data-and-author">

                <h6 class="data"><i class="fa-solid fa-calendar-days" style="margin-right: 7px;"></i><?= $post['created_date']; ?></h6>

                <h6 class="author"><i class="fa-solid fa-user" style="margin-right: 7px;"></i><?= $post['username']; ?></h6>

              </div>
  
              <div class="single-post-block__text">
  
              <?php echo $post['content']; ?>  

              </div>

              <!-- block comments -->
              <?php include "./app/include/comments.php"; ?>
  
            </div>
  
          </section>

          <div class="search-and-categories">

            <div class="search">
  
              <h3 class="search__text"><i class="fa-solid fa-magnifying-glass fa-bounce"  style="margin-right: 10px;"></i>Search...</h3>
    
              <input class="search__input" placeholder="Поиск..." style="border-radius: 6px;">
    
            </div> 

            <div class="categories">

              <div class="categories__text">

                <h3 class="categories__text-title">Категории</h3>

                <ul class="categories__text-content">

                <?php foreach ($topics as $key => $topic): ?>

                  <li class="categories__text-content__item"><a href="<?=BASE_URL . "category.php?id=" .  $topic['id']; ?>"><?= $topic['name']; ?></a></li>

                <?php endforeach; ?>

                </ul>

              </div>
              
            </div>

          </div> <!-- search-and-categories -->

        </div>

      </div>

      <?php include("./app/include/footer.php")?>