<?php
 ini_set('error_reporting', 0);
 ini_set('display_errors', 0);
 ini_set('display_startup_errors', 0);




$post_id = $_GET['post_id'];
// Если в POST_ID не число, отановим скрипт
if (!is_numeric($post_id)) exit();


require_once 'app/header.php';

///Получаем маси поста
$post = get_post_by_id($post_id);
?>


<div class="container">
	<div class="row">
		<div class="col-md-9">
			<div class="page-header">
				<h1><?=$post['title']?></h1>
			</div>
	    <ul class="list-inline">
                        <li><i class="glyphicon glyphicon-list"></i><a href="#">Название категории</a> | </li>
                        <li><i class="glyphicon glyphicon-calendar"></i> 13 декабря 2017 | 10:33 </li>
		</ul>
		<hr>
		<div class="post-content">
			<img src="<?=$post['image']?>" align="left" style="padding: 0 10px 10px 0;">
			<?=$post['content']?>
		</div>
		</div>
		<div class="col-md-3">
			 
            <?php include_once 'app/sidebar.php'; ?>
        
		</div>
	</div>
</div>



 <?php 
 	include_once 'app/footer.php';
 ?>