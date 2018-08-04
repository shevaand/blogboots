<?php
require "db.php";
require_once 'app/header.php';


$data = $_POST;

if (isset($data['do_login']))
{
    $errors = array();
    $user = R::findOne('users', 'login = ?', array($data['login']));
        if($user)
        {
            //login tru
            if( password_verify($data['password'], $user->password))
            {
                //log in
                $_SESSION['logged_user']= $user;
                echo '<div style="color: green;">Вы успешно авторизованы. Можете перейти на <a href="/toond">главную</a> страницу</div><hr>';
            }else
            {
                $errors[]='Неверно введён пароль';
            }
        }else
        {
            $errors[]='Пользователь с таким логином не найден';
        }
    
     if ( ! empty($errors))
     {
        echo '<div style="color:red;">'.array_shift($errors).'</div><hr>';
    }
}
?>

<div class="well">
	<div class="form-group">
<form action="login.php" method="POST">

    <p>
    <p><strong>Логин</strong>:</p>
    <input type="text" class="form-control" name="login" style="width: 300px" value="<?php echo @$data['login']; ?>"> 
    
    <p>
    <p><strong>Пароль</strong>:</p>
    <input type="password" class="form-control" name="password" style="width: 300px" value="<?php echo @$data['password']; ?>">
    
    <p>
    <button type="submit" class="btn btn-success btn-sm" name="do_login">Войти</button>
    </p>
</form>
    </div>
</div>
