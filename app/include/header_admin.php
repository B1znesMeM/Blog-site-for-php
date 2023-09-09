<?php require "../../path.php";
session_start();
?>



    <div class="container">

        <header class="header">

            <div class="div-logo">

                <h3 class="logo"><a class="logo__a" href="<?php echo BASE_URL . 'index.php'?>">My blog</a></h3>

            </div>
            
            <nav class="header__nav">

                <ul class="header_content">

                <li>

                        <a href="#" class="nav__item">
                        
                            <?php echo $_SESSION['login']; ?>

                        </a>

                             <li class="nav__item-li"><a href="<?php echo BASE_URL . "logout.php" ?>" class="nav__item-a">Выход</a></li>

                </li>

                </ul>

            </nav>

        </header>

        </div>