<?php

function baseAction()
{
    if ($_SERVER['REQUEST_METHOD'] = 'POST') {
        $user =  $_SESSION['user']['login'];
        $sql = 'SELECT id, login FROM users WHERE login ='. "'$user'";
        $users = mysqli_query(getConnect(), $sql);
        $arr = [];
        while ($row = mysqli_fetch_assoc($users)) {
            $arr = [
                'id' => $row['id'],
                'login' => $row['login']
            ];
        }
        $id = $arr['id'];
        $login = $arr['login'];
        $sql = "INSERT INTO orders (user_id, user_login) VALUES ('$id', '$login')";
        $comments = mysqli_query(getConnect(), $sql);
        $order_id = mysqli_insert_id(getConnect());

        foreach ($_SESSION['cart'] as $value ) {
            $product_id = $value['product_id'];
            $product_name = $value['product_name'];
            $product_price = $value['product_price'];
            $product_img = $value['product_img'];
            $product_col = $value['product_col'];

            $sql = "INSERT INTO carts (
            order_id, 
            product_id, 
            product_name, 
            product_price, 
            product_img,
            product_col) VALUES (
            '$order_id', 
            '$product_id', 
            '$product_name',
            '$product_price',
            '$product_img',
            '$product_col'
            )";
            $comments = mysqli_query(getConnect(), $sql);
        }
        unset($_SESSION['cart']);
    }
    header('Location: ?p=cart&a=order');
    exit;
};
function indexAction()
{
    if (!isset($_SESSION['user']['login'])) {
        return  $php = <<<user
для просмотра заказов необходимо <a href="?p=auth">Пройти авторзацию<a>
user;
    } else {

        if ($_SESSION['user']['role']) {
            $sql = 'SELECT order_id, order_date FROM orders';
            $users = mysqli_query(getConnect(), $sql);
        }
        else {
            $user = $_SESSION['user']['login'];
            $sql = 'SELECT order_id, order_date FROM orders WHERE user_login =' . "'$user'";
            $users = mysqli_query(getConnect(), $sql);
        }


        $arr = [];
        $html = '';
        while ($row = mysqli_fetch_assoc($users)) {
            $order_id = $row['order_id'];
//            $arr = [
//                'order_id' => $row['order_id'],
//                'order_date' => $row['order_date'],
//                'order_summ' => getTotalPrice($order_id)
//            ];
            $html .= '<div class="order_item">номер заказа ' . $row['order_id'] . ', дата ' . $row['order_date'] . ', сумма ' . getTotalPrice($order_id) . '&nbsp;&nbsp;<a href="?p=cartbase&order_id=' . $order_id . '">Посмотреть заказ</a></div>';
        }
    }
    return <<<php
<div class="orders">{$html}</div>  
php;

}
function getTotalPrice($id)
{
    $arr = [];
    $sql = 'SELECT SUM(product_price * product_col) AS total_price FROM carts WHERE order_id ='."'$id'";
    $summ = mysqli_query(getConnect(), $sql);
    while ($row = mysqli_fetch_assoc($summ)) {
        $arr = [
            'total_price' => $row['total_price'],
        ];
    }
    return $arr['total_price'];
}