<?php
session_start();
include('../funcs.php');

user_new_session();
// var_dump(  $_SESSION['user_name_id_check_out']);
// exit;

//入力チェック
if( 
  !isset($_POST['user_name']) || $_POST['user_name'] == '' ||
  !isset($_POST['user_id']) || $_POST['user_id'] == '' ||
  !isset($_POST['user_pass']) || $_POST['user_pass'] == ''
  ){
  print '入力漏れがあります。<br>確認してください。<br>';
  print '<a href="../index.html">';
  print 'トップページへ戻る。</a>';
  exit();
}

$user_name = $_POST['user_name'];
$user_id = $_POST['user_id'];
$user_pass = $_POST['user_pass'];
$user_pass2 = $_POST['user_pass2'];

$pdo = db_connect();

$check_sql = 'SELECT user_id FROM user WHERE user_id=:user_id';
$check_stmt = $pdo->prepare($check_sql);
$check_stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$check_res = $check_stmt->execute();

QueryError($check_res,$check_stmt);

$check_res = $check_stmt->fetch();

//入力チェック
if( $user_name == $user_id ){
  $_SESSION['user_name_id_check_out'] = 'ユーザーネームとユーザーIDが同一です。';
}

if( $user_name == $user_pass ){
  $_SESSION['user_name_pass_check_out'] = 'ユーザーネームとパスワードが同一です。';
}

if( $user_id == $user_pass ){
  $_SESSION['user_id_pass_check_out'] = 'ユーザーIDとパスワードが同一です。';
} 

if( $check_res['user_id'] == $user_id ){
  $_SESSION['user_id_check_out'] = '既に利用されているIDです。別のIDで登録してください。';
}

if(
    $user_name == $user_id || $user_name == $user_pass ||
    $user_id == $user_pass || $check_res['user_id'] == $user_id
){
  $_SESSION['correct'] = '修正してください。';
  header("Location: ../index.php?er=2");
  exit();
}

echo '下記の内容で登録いたします。よろしいですか？？<br>';
echo 'ユーザーネーム:', $user_name, '<br>';
echo 'ユーザーID:', $user_id, '<br>';
echo 'ユーザーpass:',$user_pass, '<br>';
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>user_new_check</title>
</head>
<body>

<form method="POST" action="user_new_add_done.php">
  <input type="hidden" name="user_name" value=<?=$user_name?>>
  <input type="hidden" name="user_id" value=<?=$user_id?>>
  <input type="hidden" name="user_pass" value=<?=$user_pass?>>
  <input type="submit" value="OK">
</form>  

</body>
</html>