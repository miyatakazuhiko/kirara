<?php
session_start();
include("../funcs.php");

s_loginCheck();

s_kanri();

$code = $_GET["code"];

$pdo = db_connect();

$sql = "SELECT * FROM staff WHERE code=:code";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':code', $code, PDO::PARAM_INT);
$status = $stmt->execute();

$view="";
if($status==false){
  $error = $stmt->errorInfo();
  exit("ErrorQuery:".$error[2]);
}else{
  $row = $stmt->fetch();
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>staff_change</title>
</head>
<body>

<h1>管理者登録内容変更</h1>

<form method="POST" action="staff_update.php">
  <input type="hidden" name="code" value="<?=$row["code"]?>">
  <label>スタッフネーム：<input type="text" name="staff_name" value="<?=$row["staff_name"]?>" required></label><br>
  <label>スタッフパスワード：<input type="text" name="staff_pass" value="<?=$row["staff_pass"]?>" required></label><br>
  <label>管理マスターフラグ：<input type="text" name="kanri_flg" value="<?=$row["kanri_flg"]?>" required></label><br>
  <label>管理フラグ：<input type="text" name="life_flg" value="<?=$row["life_flg"]?>" required></label><br>
  <input type="submit" value="登録">
</form>
  
<div>
  <a href="staff_add.php">管理者一覧へ戻る</a>
</div>
<div>
  <a href="staff.php">管理者画面へ戻る</a>
</div>


</body>
</html>