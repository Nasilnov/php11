<?php
include '../engine/lib/lib.php';
$_POST = json_decode(file_get_contents("php://input"), true);

$isproduct = false;
$arr = [];
$product_id = '';
$order_id = $_POST['order_id'];
if (isset($_POST['product'])) {
    $product_id = $_POST['product']['product_id'];
}

if (isset($_POST['method'])) {
    if ($_POST['method'] == 'add') {
        $sql = 'UPDATE carts SET product_col = product_col + 1 WHERE product_id = ' . "'$product_id'" . ' AND order_id =' . "'$order_id'";
        $comments = mysqli_query(getConnect(), $sql);
    }

    if ($_POST['method'] == 'del') {
        $sql = 'SELECT product_col FROM carts WHERE product_id = ' . "'$product_id'" . ' AND order_id =' . "'$order_id'";
        $comments = mysqli_query(getConnect(), $sql);

        while ($row = mysqli_fetch_assoc($comments)) {
            $arr = [
                'product_col' => $row['product_col'],
            ];
        }

        if ($arr['product_col'] > 1) {
            $sql = 'UPDATE carts SET product_col = product_col - 1 WHERE product_id = ' . "'$product_id'" . ' AND order_id =' . "'$order_id'";
            $comments = mysqli_query(getConnect(), $sql);
        }
        else {
            $sql ='DELETE FROM carts WHERE product_id = ' . "'$product_id'" . ' AND order_id =' . "'$order_id'";
            $comments = mysqli_query(getConnect(), $sql);
        }
    }
}

$arr = [];

$sql = 'SELECT * FROM carts WHERE order_id ='."'$order_id'";
$request = mysqli_query(getConnect(), $sql);

while ($row = mysqli_fetch_assoc($request)) {
     $arr[] = [
         'product_id' => $row['product_id'],
         'product_name' => $row['product_name'],
         'product_price' => $row['product_price'],
         'product_img' => $row['product_img'],
         'product_col' => $row['product_col']
     ];
}

echo json_encode($arr, JSON_UNESCAPED_UNICODE);
//echo json_encode($_POST, JSON_UNESCAPED_UNICODE);
