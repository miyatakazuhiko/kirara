<?php
session_start();
include("../funcs.php");

$user_name = $_POST['user_name'];
$user_id = $_POST['user_id'];
$user_pass = $_POST['user_pass'];

$pdo = db_connect();

// $check_sql = 'SELECT user_id FROM user WHERE user_id=:user_id';
// $check_stmt = $pdo->prepare($check_sql);
// $check_stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
// $check_res = $check_stmt->execute();

// QueryError($check_res,$check_stmt);

// $check_res = $check_stmt->fetch();

// if( $check_res['user_id'] == $user_id ){
//   echo "<script type='text/javascript'>";
//   echo "alert('既に登録されているユーザーネームです。')";
//   echo "</script>";
//   if( $check_res['user_id'] == $user_id ){
//     header("Location: ../index.html?er=2");
//   exit();
//   }
// }


$sql = 'INSERT INTO user(user_name, user_id, user_pass) VALUES(:user_name, :user_id, :user_pass)';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':user_pass', $user_pass, PDO::PARAM_STR);
$res = $stmt->execute();

QueryError($res,$stmt);

if($res==true){
  echo '<script type="text/javascript">';
  echo "alert('登録しました');";
  echo "window.location.href='../index.html'";
  echo '</script>';
  exit;
}

?>