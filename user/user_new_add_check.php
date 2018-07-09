<?php
session_start();
include('../funcs.php');

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

if( $_POST['user_name'] == $_POST['user_id'] ){
  print 'ユーザーネームとユーザーIDが同一です。<br>';
}

if( $_POST['user_name'] == $_POST['user_id'] ){
  print 'ユーザーネームとパスワードが同一です。<br>';
}

if( $_POST['user_id'] == $_POST['user_pass'] ){
  print 'ユーザーIDとパスワードが同一です。<br>';
}

if(
   $_POST['user_name'] == $_POST['user_id'] ||
   $_POST['user_name'] == $_POST['user_pass'] ||
   $_POST['user_id'] == $_POST['user_pass']
){
  print '<br>';
  print '登録内容を修正してください。<br>';
  print '<a href="../index.html">';
  print 'トップページへ戻る。</a>';
  exit();
}

if( $_POST['user_pass'] != $_POST['user_pass2'] ){
  echo '<script type="text/javascript">';
  echo "alert('パスワードが一致しません。トップページへ戻ります。');";
  echo "window.location.href='../index.html'";
  echo '</script>';
  exit();
}


//無事通過
$user_name = $_POST['user_name'];
$user_id = $_POST['user_id'];
$user_pass = $_POST['user_pass'];
$user_pass2 = $_POST['user_pass2'];

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
  <input type="hidden" value=<?=$user_name?>>
  <input type="hidden" value=<?=$user_id?>>
  <input type="hidden" value=<?=$user_pass?>>
  <input type="submit" value="OK">
</form>  

</body>
</html>