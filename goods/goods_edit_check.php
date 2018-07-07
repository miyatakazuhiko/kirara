<?php
session_start();
include('../funcs.php');
s_loginCheck();

$goods_code = $_POST['goods_code'];
$image_name_old = $_POST['image_name_old'];
$title = $_POST['title'];
$price = $_POST['price'];
$image_name_new = $_FILES['image'];

if($title==''){
  print '商品名が入力されていません。<br>';
}else{
  echo '商品名：', $title, '<br>';
}

if(preg_match('/\A[0-9]+\z/', $price)==0){
  print '値段が入力されていません。<br>';
}else{
  echo '値段：', $price, '<br>';
}

if($image_name_new['size']>0){
  if($image_name_new['size']>100000){
    print '画像サイズが大きすぎるよ。';
  }else{
    move_uploaded_file($image_name_new['tmp_name'],'./images/'.$image_name_new['name']);
    print '<img src="./images/'.$image_name_new['name'].'">';
    print '<br>';
  }
}

if($title=='' || preg_match('/\A[0-9]+\z/',$price)==0 || $image_name_new['size']>100000){
  print '<form>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<br>';
}else{
  print '上記のように変更します。<br>';
  print '<form method="POST" action="goods_edit_done.php">';
  print '<input type="hidden" name="goods_code" value="'.$goods_code.'">';
  print '<input type="hidden" name="title" value="'.$title.'">';
  print '<input type="hidden" name="price" value="'.$price.'">';
  print '<input type="hidden" name="image_name_old" value="'.$image_name_old.'">';
  print '<input type="hidden" name="image_name_new" value="'.$image_name_new['name'].'">';
  print '<br>';
  print '<input type="button" onclick="history.back()" value="戻る">';
  print '<input type="submit" value="OK">';
  print '</form>';
}

?>