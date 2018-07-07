<?php
session_start();
include('../funcs.php');

s_loginCheck();

$goods_code = $_GET['goods_code'];

$pdo = db_connect();

$sql = 'SELECT title, price, image FROM goods WHERE No=:No';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':No', $goods_code, PDO::PARAM_INT);
$stmt->execute();

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$title = $rec['title'];
$price = $rec['price'];
$image_name = $rec['image'];

if($image_name==''){
  $disp_image='';
}else{
  $disp_image='<img src="./images/'.$image_name.'">';
}

echo '下記の内容を削除してもよろしいですか？？？','<br>';
echo '商品名', '<br>', $title, '<br>';
echo '値段', '<br>', $price, '円<br>';
echo $disp_image;

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>goods_delete_check</title>
</head>
<body>
<form method="POST" action="goods_delete.php">  
  <input type="hidden" name="goods_code" value="<?=$goods_code?>">
  <input type="hidden" name="titel" value="<?=$title?>">
  <input type="hidden" name="price" value="<?=$price?>">
  <input type="hidden" name="image" value="<?=$image?>">
  <input type="button" onclick="history.back()" value="商品一覧へ戻る">
  <input type="submit" value="OK">
</body>
</html>