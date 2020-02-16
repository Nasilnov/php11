<?php
include '../engine/lib/lib.php';
$_POST = json_decode(file_get_contents("php://input"), true);

if ( $_POST['table'] == 'products') {

    if ( $_POST['req'] == 'set_count' && isset($_POST['id']) ) {
        $sql = 'UPDATE images SET countclick = countclick + 1 WHERE id = ' . $_POST['id'];
//        mysqli_query($link, $sql);
        mysqli_query(getConnect(), $sql);
    }

    if ($_POST['req'] == 'get_products') {
        $sql = 'SELECT * FROM products';
        $users = mysqli_query(getConnect(), $sql);

        $arr = [];
        while ($row = mysqli_fetch_assoc($users)) {
            $arr[] = [
                'product_id' => $row['product_id'],
                'product_name' => $row['product_name'],
                'product_price' => $row['product_price'],
                'product_img' => $row['product_img']
            ];
        }
    }
}

if ( $_POST['table'] == 'comments' && $_POST['req'] == 'get_comments') {

    if ( isset($_POST['id']) ) {
        $sql = 'SELECT name, date, text FROM comments WHERE id_image ='. $_POST['id'].' ORDER BY date DESC';
        $comments = mysqli_query(getConnect(), $sql);
    }
//    $arr[] = [
//        'name' => 'Вася',
//    ];
    $arr = [];
    while ($row = mysqli_fetch_assoc($comments)) {
        $arr[] = [
            'name' => $row['name'],
            'date' => $row['date'],
            'text' => $row['text']
        ];
    }
}
if ( $_POST['table'] == 'comments' && $_POST['req'] == 'insert_comments') {
    $sql = "INSERT INTO comments (id_image, name, text) VALUES ('".$_POST['id']."','".$_POST['name']."','".$_POST['text']."')";
//    $sql = "INSERT INTO comments (id_image, name, text) VALUES ( '1', 'Вася', 'Прикольная фотка')";
    $comments = mysqli_query(getConnect(), $sql);
    $arr = [
        'info' => 'Данные отправлены'
    ];
}

echo json_encode($arr, JSON_UNESCAPED_UNICODE);
//echo json_encode($_POST, JSON_UNESCAPED_UNICODE);
