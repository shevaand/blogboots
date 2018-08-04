<?php

 ini_set('error_reporting', 0);
 ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);

require "db.php";
require_once 'app/header.php';
include 'config.php';

?>

<?php if(isset($_SESSION['logged_user'])) : ?>
    <a class="btn btn-success btn-sm"
       href="logout.php">Выйти</a>
    <?php else :?>
    <a class="btn btn-success btn-sm" href="login.php">Авторизация</a>                
    <a class="btn btn-success btn-sm"  href="signup.php">Регистрация</a>
    <a href="https://www.facebook.com/v2.11/dialog/oauth?
  client_id=<?=ID?>
  &redirect_uri=<?=URL?>
  &response_type=code
  &scope=email,public_profile
  &state={state-param}"  target="_blank">Войти через FB</a>
    <br>
    <?php endif; ?>
<div class="container">
    <div class="row">
        <div class="col-md-9">
            <div class="page-header">
                <h1>Все записи:</h1>
            </div>
            <?php
            $posts = get_posts();
            ?>
            <?php foreach ($posts as $post ): ?>
            <div class="row">
                <div class="col-md-3">
                    <a href="#" class="thumbnail">
                        <img src="<?=$post['image']?>" alt="">
                    </a>
                </div>
                <div class="col-md-9">
                    <h4><a href="post.php?post_id=<?=$post['id']?>"><?=$post['title']?></a></h4>
                    <p>
                        <?=mb_substr($post['content'], 0, 128, 'UTF-8').'...'?>
                    </p>
                    <p><a class="btn btn-info btn-sm" href="post.php?post_id=<?=$post['id']?>">Читать полностью</a></p>
                    <br/>
                    <ul class="list-inline">
                        <li><i class="glyphicon glyphicon-list"></i><a href="#">Название категории</a> | </li>
                        <li><i class="glyphicon glyphicon-calendar"></i> 13 декабря 2017 | 10:33 </li>
                    </ul>
                </div>
            </div>
            <hr>
            <?php endforeach; ?>
        </div>
        <div class="col-md-3">
            <?php include_once 'app/sidebar.php'; ?>
        
        </div>
    </div>
</div>

<?php

require_once 'app/footer.php';

?>