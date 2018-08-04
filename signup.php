<?php
require "db.php";
require_once 'app/header.php';


$data = $_POST;
if( isset($data['do_signup']) )
{
    //регестрируем
    
    $errors = array();
    if (trim($data['login']) == '')
    {
        $errors[]='Введите логин';
    }
    
     if (trim($data['email']) == '')
    {
        $errors[]='Введите Email';
    }
    
     if ($data['password'] == '')
    {
        $errors[]='Введите пароль';
    }
    
     if ($data['password_2'] != $data['password'])
    {
        $errors[]='Повторный пароль введён не верно';
    }
    
    if ( R::count('users', "login = ?", array($data['login'])) > 0 )
    {
        $errors[]='Пользователь с таким логином уже существует';
    }
    
     if ( R::count('users', "email = ?", array($data['email'])) > 0 )
    {
        $errors[]='Пользователь с таким Email уже существует';
    }
    
    if (empty($errors))
    {
        //рeгeстрируем
        $user = R::dispense('users');
        $user->login = $data['login'];
        $user->email = $data['email'];
        $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
        R::store($user);
        echo '<div style="color: green;">Вы успешно зарегестрированы!<br>Можете перейти в <a href="login.php">авторизацию</a>!</div><hr>';
        
    }else
    {
        echo '<div style="color: red;">'.array_shift($errors).'</div><hr>';
    }
}
?>

<div class="well">
	<div class="form-group">

<form action="signup.php" method="POST">

    <p>
    <p><strong>Ваш логин</strong>:</p>
    <input type="text" class="form-control" name="login" style="width: 300px" value="<?php echo @$data['login']; ?>">
    

    <p>
    <p><strong>Ваш Email</strong>:</p>
    <input type="email" class="form-control" name="email" style="width: 300px" value="<?php echo @$data['email']; ?>">
   

    <p>
    <p><strong>Ваш пароль</strong>:</p>
    <input type="password" class="form-control" name="password" style="width: 300px" value="<?php echo @$data['password']; ?>">
    

    <p>
    <p><strong>Введите ваш пароль ещё раз</strong>:</p>
    <input type="password" class="form-control" name="password_2" style="width: 300px" value="<?php echo @$data['password_2']; ?>">
    
     

    <p>
    <button type="submit" class="btn btn-success btn-sm"  name="do_signup">Зарегестрироваться</button>
    </p>
</form>
    </div>
</div>