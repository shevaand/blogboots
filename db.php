<?php

require "libs/rb.php";

 R::setup( 'mysql:host=localhost;dbname=registr_omegaperun',
        'root', '' );

session_start();

$host = 'localhost'; // адрес сервера 
$database = 'registr_omegaperun'; // имя базы данных
$user = 'root'; // имя пользователя
$password = ''; // пароль

$link = mysqli_connect($host, $user, $password, $database) 
    or die("Ошибка " . mysqli_error($link));