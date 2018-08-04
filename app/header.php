<?php

require_once 'include/database.php';
require_once 'include/functions.php';

?>

<! DOCTYPE html >
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width , initial-scale=1">
    <title>Мой блог</title>


    <link href="public/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">         
                
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#responsive-menu">
                    <span class="sr-only">Отркыть навигацию</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>


                <a class="navbar-brand" href="/toond/">Мой блог</a>
            </div>
            <div class="collapse navbar-collapse" id="responsive-menu">
                <ul class="nav navbar-nav">
                    <?php
                    $categories = get_categories($link);

                    ?>
                    <?php if (count($categories) === 0): ?>
                    <li><a href="#"><i class="glyphicon glyphicon-plus-sign"></i> Добавить категорию</a> </li>
                    <?php else : ?>

                    <?php  foreach ($categories as $category): ?>
                    <li><a href="/toond/category.php?id=<?=$category["id"]?>"><?=$category["title"]?></a> </li>
                    <?php endforeach; ?>
                    <?php endif; ?>

                </ul>
            </div>
        </div>
    </div>
