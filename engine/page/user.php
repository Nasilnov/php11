<?php

if (empty($_SESSION['user'])) {
    header('Location: ?p=auth');
    exit;
}
function indexAction()
{
    return allAction();
}

function oneAction()
{
    $login = $_SESSION['user']['login'];
    $sql = "
        SELECT 
            name 
        FROM 
            users 
        WHERE 
            login = '$login'
	";
    $result = mysqli_query(getConnect(), $sql);
    $user = mysqli_fetch_assoc($result);
//    var_dump($user);

    $html =<<<php
Привет {$_SESSION['user']['login']} {$user['name']}<br><a href="?p=auth&a=exit">Выход</a>
php;
//    return 'Привет  '.$_SESSION['user'].' '.$user['name'];
    return $html;
}

function allAction()
{
//    $sql = "SELECT id, login, password, is_admin FROM users";
//    $res = mysqli_query(getConnect(), $sql);
//
//    $html = '';
//    while ($row = mysqli_fetch_assoc($res)) {
//        $html .= <<<php
//        <a href="?page=3&id={$row['id']}">{$row['login']}</a><br>
//        <a href="">Купить</a>
//
//        <hr>
//php;
//
//    }
//
//    return $html;
}