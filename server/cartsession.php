<?php
session_start();

$_POST = json_decode(file_get_contents("php://input"), true);

$isproduct = false;
$arr = [];
if ($_POST['method'] == 'add') {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => &$item) {
            if ($_POST['product']['product_id'] == $item['product_id']) {
                $item['product_col'] += 1;
                $isproduct = true;
            }
        }
    }

    if (!$isproduct && !empty($_POST['product'])) {
        $_SESSION['cart'][] = [
            'product_id' => $_POST['product']['product_id'],
            'product_name' => $_POST['product']['product_name'],
            'product_price' => $_POST['product']['product_price'],
            'product_img' => $_POST['product']['product_img'],
            'product_col' => 1];
    }
    $arr = [
        'result' => 1,
    ];
}
if ($_POST['method'] == 'del') {
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => &$item) {
            if ($_POST['product']['product_id'] == $item['product_id'] ) {
                if ($item['product_col'] > 1) {
                    $item['product_col'] -= 1;
                }
                else
                    unset ($_SESSION['cart'][$key]);
                $isproduct = true;
            }
        }
    }
}

$arr = [];
    foreach ($_SESSION['cart'] as $value ) {
    $arr[] = [
        'product_id' => $value['product_id'],
        'product_name' => $value['product_name'],
        'product_price' => $value['product_price'],
        'product_img' => $value['product_img'],
        'product_col' => $value['product_col']
    ];
}
//$arr = [
//    'contents' => $arrSession
//];
echo json_encode($arr, JSON_UNESCAPED_UNICODE);