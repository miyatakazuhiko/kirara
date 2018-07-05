<?php
session_start();
include("../funcs.php");

$pdo = db_connect();

s_loginCheck();

s_kanri();

$stmt = $pdo->prepare('SELECT * FROM staff');
$status = $stmt->execute();

$view="";
if($status==false){
  $error = $stmt->errorInfo();
  exit("sqlError".$error[2]);

}else{
  $view .= '<table width="550px" border="1">';
  $view .= '<tr>';
  $view .= '<th style="width:50px">code</th>';
  $view .= '<th style="width:200px">staff_name</th>';
  $view .= '<th style="width:200px">staff_pass</th>';
  $view .= '<th style="width:50px">kanri_flg</th>';
  $view .= '<th style="width:50px">life_flg</th>';
  $view .= '</tr>';

  while($result = $stmt->fetch(PDO::FETCH_ASSOC)){
    $view .= '<tr>';
    $view .= '<td>';
    $view .= '<a href="staff_change.php? code='.$result["code"].'">';
    // ここまだ。
    $view .= $result['code'];
    $view .= '</td>';
    $view .= '<td>';
    $view .= $result['staff_name'];
    $view .= '</td>';
    $view .= '<td>';
    $view .= $result['staff_pass'];
    $view .= '</td>';
    $view .= '<td>';
    $view .= $result['kanri_flg'];
    $view .= '</td>';
    $view .= '<td>';
    $view .= $result['life_flg'];
    $view .= '</td>';
    $view .= '</tr>';
  }
  $view .= '</table>';
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>staff_add</title>
</head>
<body>

<h1>管理者追加・変更</h1>

<form method="POST" action="staff_add_insert.php">
  <h2>管理者追加</h2>
  <label>スタッフネーム:<input type="text" name="staff_name" required></label><br>
  <label>パスワード:<input type="text" name="staff_pass" required></label><br>
  <input type="submit" value="登録">
</form>  

<div style="margin-top:20px">
  <a href="staff.php">管理者画面へ戻る</a>
</div>

<h2>管理者一覧</h2>
<p><span style="color:red">code</span>クリックで管理者情報編集</p>

<div>
  <?=$view?>
</div>

</body>
</html>