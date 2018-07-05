<?php
include("../funcs.php");

$code = $_POST["code"];
$staff_name = $_POST["staff_name"];
$staff_pass = $_POST["staff_pass"];
$kanri_flg = $_POST["kanri_flg"];
$life_flg = $_POST["life_flg"];

$pdo = db_connect();

$sql = 'UPDATE staff SET staff_name=:staff_name, staff_pass=:staff_pass, kanri_flg=:kanri_flg, life_flg=:life_flg WHERE code=:code';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':code', $code, PDO::PARAM_INT);
$stmt->bindValue(':staff_name', $staff_name, PDO::PARAM_STR);
$stmt->bindValue(':staff_pass', $staff_pass, PDO::PARAM_STR);
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_INT);
$stmt->bindValue(':life_flg', $life_flg, PDO::PARAM_INT);
$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorInfo();
  exit("QueryError:".$error[2]);
}else{
  header("Location: staff_add.php");
  exit;
}

?>