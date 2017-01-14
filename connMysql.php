<?php 
  //資料庫連線設定
  $db_host = "localhost";
  $db_table = "admin_db";
  $db_username = "root";
  $db_password = "test123";
  //設定資料連線
  if(!mysql_connect($db_host, $db_username, $db_password))
    die("資料連線失敗！");
  //連線資料庫
  if(!mysql_select_db($db_table))
    die("資料庫選擇失敗！");
  //設定字符集與連線校對
  mysql_query("SET NAMES 'utf8'");
?>
