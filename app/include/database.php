<?php

$link = mysqli_connect('localhost','root','','registr_omegaperun');
$link->set_charset("utf8");

if(mysqli_connect_errno())
{
    echo 'Ошибка подключении к БД ('.mysqli_connect_errno().'): '.mysqli_connect_error();
    exit();
}