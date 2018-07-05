<?php
session_start();
include('../funcs.php');

if(
  !isset($_POST["staff_name"]) || $_POST["staff_name"]=="" ||
  !isset($_POST["staff_pass"]) || $_POST["staff_pass"]=="" 
){
  exit("入力漏れがあります。");
}

$staff_name = $_POST["staff_name"];
$staff_pass = $_POST["staff_pass"];

$pdo = db_connect();

$sql = "INSERT INTO staff(staff_name, staff_pass) VALUES(:staff_name, :staff_pass)";

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':staff_name', $staff_name, PDO::PARAM_STR);
$stmt->bindValue(':staff_pass', $staff_pass, PDO::PARAM_STR);

$status = $stmt->execute();

if($status==false){
  $error = $stmt->errorInfo();
  exit("sqlError:".$error[2]);
}else{
  echo '<script type="text/javascript">';
  echo "alert('スタッフネーム： {$staff_name} パスワード： {$staff_pass}');";
  echo "window.location.href='staff_add.php'";
  echo '</script>';
  exit;
}

?>