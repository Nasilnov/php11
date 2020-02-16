<?php

/**
 * @return false|mysqli
 */
function getConnect()
{
    static $link;
    if (empty($link)) {
        $link = mysqli_connect('localhost', 'ptmirtu_tren3', 'alta3visnewtemp', 'ptmirtu_tren3');
    }
    return $link;
}

/**
 * @param $str
 * @return string
 */
function clearStr($str)
{
    $str = trim($str);
    $str = strip_tags($str);
    $str = mysqli_real_escape_string(getConnect(), $str);

    return $str;
}
function isAdmin()
{
    if (empty($_SESSION['user']['role'])) {
        header('Location: /');
        exit;
    }
}