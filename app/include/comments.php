
<?php 
include SITE_ROOT . "/app/controlls/commentaries.php";
?>

<div class="div-form">

    <h3 class="form-h3" style="font-size: 22px; margin-top: 3rem;">Оставить комментарий</h3>

    <form class="form" action="<?=BASE_URL . "single.php?post=$page"?>" method="post">
        <input type="hidden" name="page" value="<?= $page; ?>">

    <div class="form-group">

        <label for="exampleFormControlInput1" style="margin: 10px 0px 10px 0px;">Email адрес</label>

        <input name="email" type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
    
    <div class="form-group">

        <label for="exampleFormControlTextarea1" style="margin: 20px 0px 10px 0px;">Напишите ваш комментарий</label>

        <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="4"></textarea>

    </div>

    <div class="btn-form">

        <button type="submit" name="goComment" class="button-form" style="border: 2px solid  white; padding: 10px; border-radius: 15px; margin: 20px; margin-left: 0px">Отправить</button>

    </div>

    </form>

    <?php if(count($comments) > 0): ?>

        <div class="all-comments">

            <h3 class="h3">Комментарии к записи</h3>

            <?php foreach ($comments as $comment): ?>

                <div class="one-comment">

                    <span><i class="far fa-envelope" style="margin-right: 10px; margin-bottom: 10px"></i><?=$comment['email']  ?></span>
                    <br>
                    <span><i class="far fa-calendar-check" style="margin-right: 10px;"></i><?=$comment['created_date']  ?></span>

                    <div class="text">

                        <?=$comment['comment']  ?>

                    </div>

                </div>

            <?php endforeach ?>

        </div>

    <?php endif; ?>

</div>
