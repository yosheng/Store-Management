<?php
header("Content-Type: text/html; charset=utf-8");
require_once "../connMysql.php";
session_start();
//檢查是否已登入
require_once "../login_check.php";
//修改密碼
$sql = "UPDATE merchant SET ";
$sql .= "mct_password='" . $_POST["password1"] . "' ";
$sql .= "WHERE mct_id=" . $_POST["id"];
mysql_query($sql);
//修改密碼後，登出回到首頁
unset($_SESSION["account"]);
header("Location: index.php");
?>
