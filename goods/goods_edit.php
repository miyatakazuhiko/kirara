<?php

session_start();
include('../funcs.php');
s_loginCheck();

$goods_code = $_GET['goods_code'];

$pdo = db_connect();
$sql = 'SELECT No,title, price, image FROM goods WHERE No=:No';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':No', $goods_code, PDO::PARAM_INT);
$stmt->execute();

$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$title = $rec['title'];
$price = $rec['price'];
$image_name_old = $rec['image'];

$pdo = null;//データベースから切断することで高速化するらしい！･･･らしい！

if($image_name_old==''){
  $disp_image='';
}else{
  $disp_image='<img src="./images/'.$image_name_old.'">';
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>goods_edit</title>
</head>
<body>

<p>商品修正</p>
<p>商品コード
  <span style="padding-left:20px;"><?=$goods_code?></span>
</p>

<form method="POST" action="goods_edit_check.php" enctype="multipart/form-data">
  <input type="hidden" name="goods_code" value="<?=$goods_code?>" >
  <input type="hidden" name="image_name_old" value="<?=$image_name_old?>">
  <label>商品名
    <input type="text" name="title" value="<?=$title?>"></label><br><br>
  <label>
    　価格<input type="text" name="price" value="<?=$price?>">円</label><br><br>
  <?=$disp_image?><br>
  <label>画像を選んでください。<br>
    <input type="file" name="image" style="width:400px"></label><br>
  <input type="button" onclick="history.back()" value="戻る">
  <input type="submit" value="OK">
</form>    

</body>
</html>