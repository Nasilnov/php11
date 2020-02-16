<?php

function indexAction()
{
    $html =<<<php
    <style>
    form {
    display: flex;
    flex-direction: column;
    width: 500px;
    }
    .auth {
    display: flex;
    width: 100%;
    margin: 5px 0;    
    }
    input {
    width: 100%
    }
    </style>
    <form method="post" action="?p=reg&a=auth">
        <div class="auth"><input name="login" type="text" placeholder="Введите ваш логин" required></div>
        <div class="auth"><input name="name" type="text" placeholder="Введите вашe имя" required></div>
        <div class="auth"><input name="password" type="password" placeholder="Введите ваш пароль" required></div>
        <div class="auth"><input name="address" type="text" placeholder="Введите ваш адрес" required></div>
        <div class="auth"><input name="phone" type="text" placeholder="Введите ваш телефон" required></div>
        <div class="auth"><input type="submit"></div>
    </form>
  
php;

    if (!empty($_SESSION['user'])) {
        $html =<<<php
    <a href="?p=auth&a=exit">Выход</a>
php;
    }

    return $html;
}

function authAction()
{
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        header('Location: ?p=auth');
        $_SESSION['msg'] = 'Что-то пошло не так';
        exit;
    }

    if (empty($_POST['login']) || empty($_POST['password']) ) {
        $_SESSION['msg'] = 'Нет полных данных';
        header('Location: ?p=auth');
        exit;
    }

    $login = clearStr($_POST['login']);
    $password = clearStr($_POST['password']);
    $name = clearStr($_POST['name']);
    $address = clearStr($_POST['address']);
    $phone = clearStr($_POST['phone']);
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    $sql = "INSERT INTO users (login, password, is_admin, name, address, phone ) VALUES ( '$login', '$password', '0', '$name', '$address', '$phone')";
    $result = mysqli_query(getConnect(), $sql);
//    $user = mysqli_fetch_assoc($result);



    $sql = "
        SELECT 
            id, login, password, is_admin 
        FROM 
            users 
        WHERE 
            login = '$login'
	";

    $result = mysqli_query(getConnect(), $sql);
    $user = mysqli_fetch_assoc($result);

    $msg = 'Что-то пошло не так попробуйте еще раз';
    if (empty($user)) {
        header('Location: ?p=auth');
        $_SESSION['msg'] = $msg;
        exit;
    }

//    password_hash("asdasd", PASSWORD_DEFAULT);
    if (password_verify($_POST['password'], $user['password'])) {
        $_SESSION['user'] = [
            'login' => $login,
            'role' => (boolean)$user['is_admin']
        ];
        $msg = 'Вы успешно зарегестрированы';
    }

    $_SESSION['msg'] = $msg;

    header('Location: ?p=reg');
    exit;

}

function exitAction()
{
//    session_destroy();
    header('Location: ?p=auth');
    exit;
}