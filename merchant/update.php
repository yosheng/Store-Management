<?php
header("Content-Type: text/html; charset=utf-8");
require_once "../connMysql.php";
session_start();
//檢查是否已登入
require_once "../login_check.php";
//執行更新動作
if ($_FILES["picture"]["tmp_name"] != "") {
	$sql = "UPDATE merchant SET ";
	$sql .= "mct_name='" . $_POST["name"] . "',";

	$sql .= "mct_telephone='" . $_POST["telephone"] . "',";
	$sql .= "mct_address='" . $_POST["address"] . "',";
	$sql .= "mct_memo='" . $_POST["memo"] . "',";
	$sql .= "mct_picurl='" . $_FILES["picture"]["name"] . "' ";
	$sql .= "WHERE mct_id=" . $_POST["id"];
	mysql_query($sql);
	if (!move_uploaded_file($_FILES["picture"]["tmp_name"], "images/" . $_FILES["picture"]["name"])) {
		die("檔案上傳失敗！");

	}
} else {
	$sql = "UPDATE merchant SET ";
	$sql .= "mct_name='" . $_POST["name"] . "',";

	$sql .= "mct_telephone='" . $_POST["telephone"] . "',";
	$sql .= "mct_address='" . $_POST["address"] . "',";
	$sql .= "mct_memo='" . $_POST["memo"] . "' ";
	$sql .= "WHERE mct_id=" . $_POST["id"];
	mysql_query($sql);
}
//修改完成後重導回會員中心
header("Location: member_center.php");
?>
