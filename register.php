<?php
header("Content-Type: text/html; charset=utf-8");
require_once "connMysql.php";
//確認帳號是否已註冊
$sql    = "SELECT mct_account FROM merchant WHERE mct_account='" . $_POST["account"] . "'";
$record = mysql_query($sql);
if (mysql_num_rows($record) > 0) {
	header("Location: register.php?registered=true&account=" . $_POST["account"]);
} else {
	//若此帳號尚未註冊，則執行新增的動作
	if ($_FILES["picture"]["tmp_name"] != "") {
		$sql = "INSERT INTO merchant (mct_name, mct_account, mct_password, mct_telephone, mct_address, mct_memo, mct_picurl) VALUES (";
		$sql .= "'" . $_POST["name"] . "',";
		$sql .= "'" . $_POST["account"] . "',";
		$sql .= "'" . $_POST["password1"] . "',";
		$sql .= "'" . $_POST["telephone"] . "',";
		$sql .= "'" . $_POST["address"] . "',";
		$sql .= "'" . $_POST["memo"] . "',";
		$sql .= "'" . "images/" . $_FILES["picture"]["name"] . "')";
		mysql_query($sql);
		if (!move_uploaded_file($_FILES["picture"]["tmp_name"], "merchant/images/" . $_FILES["picture"]["name"])) {
			die("檔案上傳失敗！");
		}} else {
		$sql = "INSERT INTO merchant (mct_name, mct_account, mct_password, mct_telephone, mct_address, mct_memo, mct_picurl) VALUES (";
		$sql .= "'" . $_POST["name"] . "',";
		$sql .= "'" . $_POST["account"] . "',";
		$sql .= "'" . $_POST["password1"] . "',";
		$sql .= "'" . $_POST["telephone"] . "',";
		$sql .= "'" . $_POST["address"] . "',";
		$sql .= "'" . $_POST["memo"] . "',";
		$sql .= "'" . "../images/shop.png" . "')";
		mysql_query($sql);
	}

	//動態產生資料庫
	mysql_query("CREATE DATABASE " . $_POST["account"] . "_shop" . " DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci");
	mysql_select_db($_POST["account"] . "_shop");

	mysql_query("
  CREATE TABLE IF NOT EXISTS `category` (
    `category_id` int(10) unsigned NOT NULL,
    `category_title` varchar(100) COLLATE utf8_unicode_ci NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1
") or die(mysql_error());

	mysql_query("
  CREATE TABLE IF NOT EXISTS `item` (
    `ap_id` int(10) unsigned NOT NULL,
    `category_id` int(10) unsigned NOT NULL,
    `ap_subject` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
    `ap_price` int(11) unsigned NOT NULL,
    `ap_desc` text COLLATE utf8_unicode_ci,
    `ap_picurl` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
    `ap_hits` int(11) NOT NULL
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1
	") or die(mysql_error());

	mysql_query("
		CREATE TABLE IF NOT EXISTS `weblog` (
			`log_id` int(11) NOT NULL,
			`name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			`post_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
			`userid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
			`count` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
			`singlemoney` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
			`status` int(11) NOT NULL
			) ENGINE =InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1
	") or die(mysql_error());

	mysql_query("
  ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`)
  ") or die(mysql_error());

	mysql_query("
  ALTER TABLE `item`
  ADD PRIMARY KEY (`ap_id`);
  ") or die(mysql_error());

	mysql_query("
  ALTER TABLE `weblog`
  ADD PRIMARY KEY (`log_id`)
  ") or die(mysql_error());

	mysql_query("
  ALTER TABLE `category`
  MODIFY `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT
  ") or die(mysql_error());

	mysql_query("
  ALTER TABLE `item`
  MODIFY `ap_id` int(10) unsigned NOT NULL AUTO_INCREMENT
  ") or die(mysql_error());

	mysql_query("
  ALTER TABLE `weblog`
  MODIFY `log_id` int(11) unsigned NOT NULL AUTO_INCREMENT
  ") or die(mysql_error());

}

?>
<script language="javascript">
  alert("註冊成功\n請用申請的帳號密碼登入。");
  window.location.href = "index.php";
</script>
