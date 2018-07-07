<?php
session_start();
include('../funcs.php');

s_loginCheck();

$goods_code = $_POST['goods_code'];
$title = $_POST['title'];
$price = $_POST['price'];
$image_name_old = $_POST['image_name_old'];
$image_name_new = $_POST['image_name_new'];

$pdo = db_connect();

$sql = 'UPDATE goods SET title=:title, price=:price, image=:image WHERE No=:No';
$stmt=$pdo->prepare($sql);
$stmt->bindValue(':No', $goods_code, PDO::PARAM_INT);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':image', $image_name_new, PDO::PARAM_STR);
$stmt->execute();

$pdo = null;

if($image_name_old != $image_name_new){
  if($image_name_old != ''){
    unlink('./images/'.$image_name_old);
  }
}
//if($image_name_old != $image_name_new || $image_name_old != ''){これはダメ？}

print '修正しました。<br>';


echo '<a href="goods_list.php">', '商品一覧へ戻る', '</a>';
print '<br>';
echo '<a href="../staff_login/staff.php">', '管理者画面へ戻る', '</a>';

?>