<?php
if(isset($_GET['er'])==2){
  session_start();
  $user_name_id_check_out = $_SESSION['user_name_id_check_out'];
  $user_name_pass_check_out = $_SESSION['user_name_pass_check_out'];
  $user_id_pass_check_out = $_SESSION['user_id_pass_check_out'];  
  $user_id_check_out = $_SESSION['user_id_check_out'];
  $correct = $_SESSION['correct'];
}else{
  $safe="";
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Topページ</title>
</head>
<body>
  <header>
    <h1>まんがタイム<span class="h1_color_1">きらら</span><span class="h1_color_2">非公式応援サイト</span></h1>
  </header>

  <p>一般の方はこちらを<span><a href="common_top.php" >Clic</a></span></p><br>

  <p>会員登録はこちらから</p>
    <?php if(isset($user_name_id_check_out)){echo $user_name_id_check_out, '<br>';} ?>
    <?php if(isset($user_name_pass_check_out)){echo $user_name_pass_check_out, '<br>';}?>
    <?php if(isset($user_id_pass_check_out)){echo $user_id_pass_check_out, '<br>';}?>
    <?php if(isset($correct)){echo $correct, '<br>';}?>
    <form method="POST" action="user/user_new_add_check.php">
      <label>ユーザーネーム:<input type="text" name="user_name" required>※フルネームでお願いします。</label><br>
      <label>ユーザーID:<input type="text" name="user_id" required>
      <?php if($safe=""){print '※ログイン時に必要なIDです。';}?>
      <?php if(isset($user_id_check_out)){echo $user_id_check_out;}?>
      </label><br>
      <label>ユーザーpass:<input type="pass" name="user_pass" required></label><br>
      <label>もう一度入力:<input type="pass" name="user_pass2" required>※確認のため、ユーザーpassをもう一度入力してください。</label><br>
      <input type="submit" value="会員登録"><br><br>
    </form>

  <div style="display:flex; justify-content: space-between;">  
    <div>
      <p>会員さんログインはこっちから！！</p>
        <form method="POST" action="user_login_check.php">
          <label>ユーザーネーム:<input type="text" name="user_name" required></label><br>
          <label>　　パスワード:<input type="text" name="user_pass" required></label><br>
          <input type="submit" value="ログイン">
        </form><br><br>
    </div>

    <div>
      <p>管理者ログイン</p>
        <form method="POST" action="staff_login/staff_login_check.php">
          <label>スタッフネーム:
          <input type="text" name="staff_name" required></label><br>
          <label>　 パスワード：
         <input type="password" name="staff_pass" required></label>
          <br>
          <input type="submit" value="ログイン">
        </form> 
    </div>    
  </div>  

<?php  var_dump($_SESSION['user_id_check_out']); ?>
</body
</htmlc>