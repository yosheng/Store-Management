<?php

require_once "connMysql.php";
// 新增商品種類
if (isset($_POST["action"]) && ($_POST["action"] == "add")) {
  $query_insert = "INSERT INTO `category` (`category_title`) VALUES (";
  $query_insert .= "'" . $_POST["category_title"] . "')";
  mysql_query($query_insert);
//取得新增的商品種類編號
  $category_pid = mysql_insert_id();

//執行照片新增及檔案上傳
  if ($_FILES["ap_picurl"]["tmp_name"] != "") {
    $query_insert = "INSERT INTO item (category_id, ap_subject, ap_price, ap_desc, ap_picurl) VALUES (";
    $query_insert .= $category_pid . ",";
    $query_insert .= "'" . $_POST["ap_subject"] . "',";
    $query_insert .= "'" . $_POST["ap_price"] . "',";
    $query_insert .= "'" . $_POST["ap_desc"] . "',";
    $query_insert .= "'" . $_SESSION["account"] . "/" . $_FILES["ap_picurl"]["name"] . "')";

    mysql_query($query_insert);

    $PATH  = 'C:/xampp/htdocs/Store/menu/shops/';//照片上傳的位置
    $shops = $_SESSION["account"];//不同商家上傳到不同的資料夾，命名方式以商家賬號命名

    if (!is_dir($PATH . $shops)) {
      mkdir($PATH . $shops, 0777);
      if (!move_uploaded_file($_FILES["ap_picurl"]["tmp_name"], $PATH . $shops . "/" . $_FILES["ap_picurl"]["name"])) {
        die("檔案上傳失敗！");
      }
    } else {
      if (!move_uploaded_file($_FILES["ap_picurl"]["tmp_name"], $PATH . $shops . "/" . $_FILES["ap_picurl"]["name"])) {
        die("檔案上傳失敗！");
      }
    }

  }

//重新導向到修改畫面
  header("Location: itemfix.php?id=" . $category_pid);
}

?>
<html>
<head>
  <meta name="viewport" content="width=device-width,
                                       initial-scale=1.0,
                                       maximum-scale=1.0,
                                       user-scalable=no">
<title>商品庫存管理系統-新增庫存</title>
  <!-- 新 Bootstrap 核心 CSS 檔案 -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- 可選的Bootstrap主題檔案（一般不使用） -->
  <script src="../css/bootstrap-theme.min.css"></script>
  <!-- jQuery檔案。務必在bootstrap.min.js 之前引入 -->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 檔案 -->
  <script src="../js/bootstrap.min.js"></script><!--匯入bootstrap的js-->
  <link rel="stylesheet" href="../css/bootswatch.min.css"><!--匯入bootstrap的css-->

  <link rel="icon" href="../favicon.ico"><!--favicon顯示-->

</head>
<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0"><!--body基礎配置-->
 <!-- NAV BAR 專用-->
<?php
require_once "mbrnavbar.php";
?>
<?php
header("Content-Type: text/html; charset=utf-8");

require_once "../connMysql.php";

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

<table class="table table-bordered table-hover" align="center" style="width:700px">
    <thead>
        <tr>
            <th>
                <h3 align="center">庫存管理－新增</h3>
                <form action="" method="post" class="form-horizontal" enctype="multipart/form-data" name="form1" id="form1">
                    <div class="form-group">
                        <label class="col-lg-2 control-label">項目名稱</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="category_title" id="category_title" />
                        </div>
                    </div>
                    <hr />
                    <div class="form-group">
                        <label class="col-lg-2 control-label">名稱</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="ap_subject" id="ap_subject">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">數量</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="ap_price" id="ap_price">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">說明</label>
                        <div class="col-lg-10">
                            <textarea name="ap_desc" class="form-control" id="ap_desc" cols="45" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 control-label">檔名</label>
                        <div class="col-lg-10">
                            <input class="btn btn-danger" class="form-control" type="file" name="ap_picurl" id="ap_picurl" />
                        </div>
                    </div>
                    <p>
                        <font color="#FF0000">*</font>表示為必填的欄位
                    </p>
                    <p align="center">
                        <!--align的位置配置-->
                        <input name="action" type="hidden" id="action" value="add">
                        <input type="submit" name="button" id="button" class="btn btn-primary" value="確定新增" />
                        <!--bootstrap的button-->
                        <input type="button" name="button2" id="button2" class="btn btn-primary" value="回上一頁" onClick="window.history.back();" />
                        <!--bootstrap的button-->
                    </p>
                </form>
            </th>
        </tr>
    </thead>
</table>

<br>
<!-- FOOTER 專用-->
<?php
require_once "../footbar.php";
?>
        </body>
        </html>
