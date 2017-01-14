<?php 
  session_start();
  //登出操作，將SESSION資料清除，返回首頁
  unset($_SESSION["account"]);
  header("Location: index.php");
?>