<?php
session_start();
include('../funcs.php');
s_loginCheck();

$title = $_POST['title'];
$price = $_POST['price'];
$image_name = $_POST['image_name'];

$pdo = db_connect();

$sql = 'INSERT INTO goods(title, price, image) VALUES(:title, :price, :image_name)';

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':image_name', $image_name, PDO::PARAM_STR);

$status = $stmt->execute();

echo $title,'を追加しました。<br>';

echo '<a href="goods_add.php">','商品追加画面へ戻る','</a>','<br>';
echo '<a href="../staff_login/staff.php">','管理者画面へ戻る','</a>';

?>