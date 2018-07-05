<?php
session_start();
include('../funcs.php');

$staff_name=$_POST['staff_name'];
$staff_pass=$_POST['staff_pass'];

// $staff_pass=md5($staff_pass);//暗号化：新規登録の時で、ログインの時はダメ
//暗号化解除

$pdo = db_connect();

$sql = "SELECT * FROM staff WHERE staff_name=:staff_name AND staff_pass=:staff_pass";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':staff_name', $staff_name, PDO::PARAM_STR);
$stmt->bindValue(':staff_pass', $staff_pass, PDO::PARAM_STR);
$res = $stmt->execute();

QueryError($res,$stmt);

//1行取ってくる。
$val = $stmt->fetch();

if($val["staff_name"] != ""){
  $_SESSION["s_chk_ssid"] = session_id();
  $_SESSION["staff_name"] = $val["staff_name"];
  $_SESSION["staff_pass"] = $val["staff_pass"];
  $_SESSION["life_flg"] = $val["life_flg"];
  $_SESSION["kanri_flg"] = $val["kanri_flg"];
  header("Location: staff.php");
}else{
  header("Location: ../index.html");// ''で囲むと''が文字列として判定される
}
exit();

?>