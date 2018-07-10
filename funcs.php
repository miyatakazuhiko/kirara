<?php

//XSS対応関数
function h($value){
  return htmlspecialchars($value,ENT_QUOTES);
}

function db_connect(){
  try {
    $pdo = new PDO('mysql:dbname=kirara;charset=utf8;host=localhost','root','');
  } catch (PDOException $e) {
    exit ('dbError'.$e->getMessage());
  }
  return $pdo;
}

//LOGIN認証チェック関数
function loginCheck(){
  if( !isset($_SESSION["chk_ssid"]) || $_SESSION["chk_ssid"] !=session_id()){
    echo "LOGIN Error!";
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["chk_ssid"] = session_id();
  }
}

//staffLOGIN認証チェック関数
function s_loginCheck(){
  if( !isset($_SESSION["s_chk_ssid"]) || $_SESSION["s_chk_ssid"] !=session_id()){
    echo '<script type="text/javascript">';
    echo "alert('ログインエラー！！トップページに戻ります。');";
    echo "window.location.href='../index.html'";
    echo '</script>';
    exit();
  } else {
    session_regenerate_id(true);
    $_SESSION["s_chk_ssid"] = session_id();
  }
}

//QueryError
function QueryError($res,$stmt){
  if($res == false) {
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);
  }
}

//会員登録時の$_SESSION初期化まとめ
function user_new_session(){
      $_SESSION['user_name_id_check_out'] = null;
      $_SESSION['user_name_pass_check_out'] = null;
      $_SESSION['user_id_pass_check_out'] = null;  
      $_SESSION['user_id_check_out'] = null;
      $_SESSION['correct'] = null;
}

//凄い管理者用
function s_kanri(){
  if($_SESSION["kanri_flg"]!=1){
  echo '<script type="text/javascript">';
  echo "alert('凄い管理者専用ページです。');";
  echo "window.location.href='../index.html'";
  echo '</script>';
  exit;
  }
}

//goods_branch.php 商品が選択されてない
function not_select(){
  echo '<script type="text/javascript">';
  echo "alert('商品が選択されていません');";
  echo "window.location.href='goods_list.php'";
  echo '</script>';
  exit();
}
?>