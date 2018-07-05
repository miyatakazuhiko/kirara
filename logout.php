<?php
session_start();

$_SESSION = array();//$_SESSION全てに対して、空っぽになる。

if(isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time()-42000, '/');
}

session_destroy();

header("Location: index.html");
exit();

?>