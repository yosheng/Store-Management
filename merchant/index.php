<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width,
  initial-scale=1.0,
  maximum-scale=1.0,
  user-scalable=no">
  <title>商家商品管理系統</title>
<?php if (isset($_GET["loginFail"])) {?>
<script language="javascript">
    alert("登入失敗，請重新登入");
  </script>
<?php }?>
<!-- 新 Bootstrap 核心 CSS 檔案 -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- 可選的Bootstrap主題檔案（一般不使用） -->
  <script src="../css/bootstrap-theme.min.css"></script>
  <!-- jQuery檔案。務必在bootstrap.min.js 之前引入 -->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 檔案 -->
  <script src="../js/bootstrap.min.js"></script><!--匯入bootstrap的js-->
  <link rel="stylesheet" href="../css/bootswatch.min.css"><!--匯入bootstrap的css-->
  <link rel="shortcut icon" href="../favicon.ico"><!--favicon顯示-->
</head>

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0"><!--body基礎配置-->
 <!-- NAV BAR 專用-->
<?php
require_once "mctnavbar.php";
?>
<?php
require_once "../connMysql.php";
session_start();
//檢查是否已登入
require_once "../login_check.php";
//查詢登入會員資料
$sql    = "SELECT * FROM merchant WHERE mct_account='" . $_SESSION["account"] . "'";
$record = mysql_query($sql);
$row    = mysql_fetch_assoc($record);
?>
        <li><a>使用者：<?php echo $row["mct_account"];?></a></li><!--顯示使用者id-->
        <li><a href="../logout.php">登出系統  </a></li><!--連結-->
      </ul>

    </div>
  </div>
  <!--以上為Nav Bar-->

  <!-- 填充區 -->
  <div class="Message">
  <div align="center" style="margin:0 auto">
    <img src="<?php echo $row["mct_picurl"];?>" width="300" alt="Store Management" align="absbottom">
  </div>
  </div>
  <!-- 填充結束 -->
  <br>
  <!-- FOOTER 專用-->
<?php
require_once "../footbar.php";
?>
</body>
</html>
