<?php
session_start();
include('../funcs.php');

s_loginCheck();

$goods_code = $_POST['goods_code'];

$pdo = db_connect();

$sql = 'DELETE FROM goods WHERE No=:No';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':No', $goods_code, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  header("Location: goods_list.php");
  exit;
}
?>