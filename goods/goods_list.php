<?php
session_start();
include('../funcs.php');

s_loginCheck();

print $_SESSION['staff_name'];
print 'さんログイン中です。頑張ってください。<br>';
print '<br>';

$pdo = db_connect();

$sql = 'SELECT No,title, price, image FROM goods WHERE 1';
$stmt= $pdo->prepare($sql);
$stmt->execute();

$pdo=null;

print '商品一覧<br>';

print '<form method="POST" action="goods_branch.php">';
while(true){
  $rec = $stmt->fetch(PDO::FETCH_ASSOC);
  if($rec==false){
    break;
  }
  print '<input type="radio" name="goods_code" value="'.$rec['No'].'">';
  print $rec['No'].'---';
  print $rec['title'].'---';
  print $rec['price'].'円<br>';
}
print '<input type="submit" name="disp" value="参照">';
print '<input type="submit" name="add" value="追加">';
print '<input type="submit" name="edit" value="修正">';
print '<input type="submit" name="delete" value="削除">';
print '<br>';
print '</form>';
?>

<body>

<br>
<a href="../staff_login/staff.php">管理者画面へ戻る</a><br>

</body>
