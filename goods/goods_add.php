<?php
session_start();
include('../funcs.php');
s_loginCheck();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>goods_add</title>
</head>
<body>
  
<p>商品追加</p>

<form method="POST" action="goods_add_check.php" enctype="multipart/form-data">
  <label>商品を入力<br>
  <input type="text" name="title" required></label><br><br>
  <lable>著作者<br>
  <input type="text" name="author" required></label><br><br>
  <label>カテゴリー<br>
  <input type="text" name="category" required></lable><br><br>
  <label>価格を入力<br>
  <input type="text" name="price" required></label><br><br>
  <label>画像を選択
  <input type="file" name="image"></label><br><br>
  <input type="submit" value="登録"><br><br><br><br>
  <a href="goods_list.php">商品一覧へ戻る</a>
</form>


</body>
</html>