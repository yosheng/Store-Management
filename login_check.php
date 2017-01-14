<?php
//檢查是否已登入，若未登入則導回首頁
if (!isset($_SESSION["account"]) || ($_SESSION["account"] == "")) {

	if (strpos($_SERVER['PHP_SELF'], "/menu") == 11) {
		header("Location: ../index.php");
	} else if (strpos($_SERVER['PHP_SELF'], "/merchant") == 11) {
		header("Location: ../index.php");
	} else if (strpos($_SERVER['PHP_SELF'], "/order") == 11) {
		header("Location: ../index.php");
	} else {
		header("Location: index.php");
	}

}
?>
