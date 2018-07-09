<?php
session_start();
include('../funcs.php');
s_loginCheck();

$goods_code = $_GET['goods_code'];

$pdo = db_connect();

$sql = 'SELECT No, title, author, category, price, image FROM goods WHERE No=:No';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':No', $goods_code, PDO::FETCH_ASSOC);
// $sql = 'SELECT No, title, price, image FROM goods WHERE No=?';
// $stmt = $pdo->prepare($sql);
// $data[] = $goods_code;//実行するNoを$data[]に入れて、次でexecute($data)
// $stmt->execute($data);
$stmt->execute();

$rec = $stmt->fetch(PDO::FETCH_ASSOC);

$No = $rec['No'];
$title = $rec['title'];
$author = $rec['author'];
$category = $rec['category'];
$price = $rec['price'];
$image_name = $rec['image'];

$pdo=null;

if($image_name==''){
  $disp_image='';
}else{
  $disp_image='<img src="./images/'.$image_name.'">';
}

echo '■商品情報参照 <br><br>';
echo '商品コード：',$goods_code,'<br><br>';
echo '　　商品名：',$title,'<br><br>';
echo '　　著作者：',$author,'<br><br>';
echo 'カテゴリー：',$category,'<br><br>';
echo '　　　価格：',$price,'円<br><br>';
echo $disp_image,'<br><br>';

echo '<input type="button" onclick="history.back()" value="商品一覧へ戻る">';

?>