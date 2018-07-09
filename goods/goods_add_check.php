<?php
session_start();
include('../funcs.php');

s_loginCheck();

//なんかコレ、空白をはじいてくれない･･･
if(
  !isset($_POST["title"]) || $_POST["title"]=="" ||
  !isset($_POST["price"]) || $_POST["price"]==""  
){
  exit ("入力漏れがあります。");
}

$title = $_POST['title'];
$author = $_POST['author'];
$category = $_POST['category'];
$price = $_POST['price'];
$image = $_FILES['image'];

echo '商品名:', $title, '<br>';
echo '著作者:', $author, '<br>';
echo 'カテゴリー:', $category, '<br>'; 
echo '値段:'  , $price, '<br>';

if($image['size']>0){
  if($image['size']>100000){
    echo '画像のサイズが大きすぎるよ';
  }else{
    //画像をimagesフォルダにアップロードする。tmp_nameは仮にアップロードされている画像本体の場所と名前    move_uploaded_fileで移動先へ
    move_uploaded_file($image['tmp_name'],'./images/'.$image['name']);
    echo '<img src="./images/'.$image['name'].'">';//アップロードした画像を表示
    echo '<br>';
  }
}

if($image=='' || preg_match('/\A[0-9]+\z/',$price)==0 || $image["size"]>100000){
  echo '<form>',
       '<input type="button onclick="history.back()" value="戻る">',
       '</form>';
}else{
  echo '上記の商品を追加します。<br>',
       '<form method="POST" action="goods_add_done.php">',
       '<input type="hidden" name="title" value="'.$title.'">',
       '<input type="hidden" name="author" value="'.$author.'">',
       '<input type="hidden" name="category" value="'.$category.'">',
       '<input type="hidden" name="price" value="'.$price.'">',
       '<input type="hidden" name="image_name" value="'.$image['name'].'">',
       '<br>',
       '<input type="button" onclick="history.back()" value="戻る">',
       '<input type="submit" value="OK">',
       '</form>';  
}



?>