<?php

function indexAction()
{
    $html =<<<php
    <form method="post" action="?p=auth&a=auth">
        <input name="login" type="text" placeholder="login">
        <input name="password" type="text" placeholder="password">
        <input type="submit">
    </form>
    <a href="?p=reg">Зарегестрироваться<a>
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

    $login = $_POST['login'];
    $password = $_POST['password'];

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

    $msg = 'Не верный логин или пароль';
    if (empty($user)) {
        header('Location: ?p=auth');
        $_SESSION['msg'] = $msg;
        exit;
    }

//    password_hash("asdasd", PASSWORD_DEFAULT);
    if (password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'login' => $login,
            'role' => (boolean)$user['is_admin']
        ];
        $msg = 'Добро пожаловать';
        header('Location: ?p=user&a=one');
        exit;
    }

    $_SESSION['msg'] = $msg;

    header('Location: ?p=auth');
    exit;

}

function exitAction()
{
//    session_destroy();
    unset($_SESSION['user']);
    header('Location: ?p=auth');
    exit;
}