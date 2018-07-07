<?php
session_start();
include('../funcs.php');
s_loginCheck();

//参照
if(isset($_POST['disp'])==true){
  if(isset($_POST['goods_code'])==false){
    not_select();
  }
  $goods_code = $_POST['goods_code'];
  header('Location: goods_disp.php?goods_code='.$goods_code);
  exit;
}

//追加
if(isset($_POST['add'])==true){
  header('Location: goods_add.php');
  exit;
}

//修正
if(isset($_POST['edit'])==true){
  if(isset($_POST['goods_code'])==false){
    not_select();
  }
  $goods_code = $_POST['goods_code'];
  header('Location: goods_edit.php?goods_code='.$goods_code);
  exit;
}

//削除
if(isset($_POST['delete'])==true){
  if(isset($_POST['goods_code'])==false){
    not_select();
  }
  $goods_code = $_POST['goods_code'];
  header('Location: goods_delete_check.php?goods_code='.$goods_code);
}