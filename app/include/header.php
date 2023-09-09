<?php include "path.php"; ?>


    <div class="container">

        <header class="header">

            <div class="div-logo">

                <h3 class="logo"><a class="logo__a" href="<?php echo BASE_URL . 'index.php'?>">My blog</a></h3>

            </div>
            
            <nav class="header__nav">

                <ul class="header_content">

                    <li><a class="nav__item" href="<?php echo BASE_URL . 'index.php'?>">Главная</a></li>

                    <li><a class="nav__item" href="#">О нас</a></li>

                    <li><a class="nav__item" href="#">Услуги</a></li>

                    <li>
                        <?php if(isset($_SESSION['id'])): ?>

                        <a href="#" class="nav__item">
                        
                            <?php echo $_SESSION['login']; ?>

                        </a>

                        <ul>
                        <?php if($_SESSION['admin']): ?>
                            <li class="nav__item-li"><a href="../../admin/post/index.php" class="nav__item-a">Админ панель</a></li>
                        <?php endif; ?>

                             <li class="nav__item-li"><a href="<?php echo "logout.php" ?>" class="nav__item-a">Выход</a></li>

                        </ul>

                        <?php else: ?>

                            <a href="<?php echo BASE_URL . "log.php"?>" class="nav__item">
                        
                            Вход

                            </a>
                            <ul>

                             <li class="nav__item-li"><a href="<?php echo BASE_URL . "reg.php"?>" class="nav__item-a">Регистрация</a></li>

                            </ul>

                            <?php endif; ?>

                    </li>

                </ul>

            </nav>

        </header>

        </div>