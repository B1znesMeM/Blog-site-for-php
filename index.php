 <?php
      include "./path.php";
      include $_SERVER['DOCUMENT_ROOT'] . "/app/controlls/topics.php";

      $page = isset($_GET['page'])? $_GET['page'] : 1;
      $limit = 3;
      $offset = $limit * ($page - 1);
      $total_pages = round(countRow('posts') / $limit, 0);
      
      $posts = selectAllFromPostsWithUsersOnIndex('posts', 'website', $limit, $offset);
      $TopTopic = selectTopTopicsFromPostsOnIndex('posts');
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

        <!-- Slider Start-->

        <div class="container-slide">

          <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
              <div class="carousel-inner">
              <?php foreach ($posts as $post): ?>
                <?php if($key == 0): ?>
                <div class="carousel-item active">
                <?php else: ?>
                <div class="carousel-item">
                <?php endif;?>
                  <img src="<?= BASE_URL . "assets/image__php-website/posts/" . $post['img']; ?>" alt="<?= $post['title']; ?>" alt="<?= $post['title']; ?>" class="d-block w-100" alt="...">
                  <div class="carousel-caption d-none d-md-block">
                    <h5><a href="<?= BASE_URL . 'single.php?post=' . $post['id']; ?>"><?= substr($post['title'], 0 , 120) . '...'; ?>"></a></h5>
                  </div>
                </div>
                <?php endforeach; ?>
  
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
  
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
  
            </div>

      </div>

        </div>

      <!-- Slider END -->

      <div class="container">

        <div class="post-and-search-div">

          <section class="post">

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
            <!-- Навигация -->
            <?php include "app/include/pagination.php"?>

          </section>

          <div class="search-and-categories-index">

            <div class="search">
  
              <h3 class="search__text"><i class="fa-solid fa-magnifying-glass fa-bounce"  style="margin-right: 10px;"></i>Search...</h3>
            
              <form action="search.php" method="post">

              <input type="text" name="search-term" class="search__input" placeholder="Поиск..." style="border-radius: 6px;">
    
              </form>

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

      <?php require "./app/include/footer.php" ?>