<?php
session_start();
include('../funcs.php');

s_loginCheck();

$pdo = db_connect();

if($_SESSION["life_flg"]==0){
  echo '管理権限がありません。<br><br>';
  echo '<a href="../index.html">', 'ログインページへ戻る。</a>';
  exit;
}


?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>staff</title>
</head>
<body>
  
<h1>管理者画面</h1>

<?php if($_SESSION["kanri_flg"]==1){ ?>
<p><?=$_SESSION["staff_name"]?>さんこんにちは。いつも焼肉ごちそうさまです。</p>
<?php }else{?>
<p><?=$_SESSION["staff_name"]?>さんこんにちは。ちゃんと仕事してください。</p>
<?php } ?>

<?php if($_SESSION["kanri_flg"]==1){ ?>
  <a href="staff_add.php">管理者追加・変更</a><br><br>
<?php }?>
<a href="staff_user_list.php">ユーザー一覧</a><br><br><!-- 未  -->
<a href="../goods/goods_list.php">商品一覧/編集・追加・削除</a><br><br>
<a href="../logout.php">ログアウト/ログイン画面へ戻る</a><br><br>

</body>
</html>