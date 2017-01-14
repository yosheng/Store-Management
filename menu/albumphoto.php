<?php

require_once "connMysql.php";
//顯示照片SQL敘述句
$query_RecPhoto = "SELECT `category`.`category_title`,`item`.* FROM `category`,`item` WHERE (`category`.`category_id`=`item`.`category_id`) AND `ap_id`=" . $_GET["id"];
//將SQL敘述句查詢資料到 $result 中
$RecPhoto = mysql_query($query_RecPhoto);
//取得商品種類資訊
$row_RecPhoto = mysql_fetch_assoc($RecPhoto);
?>
<html>
<head>
<meta name="viewport" content="width=device-width,
                                       initial-scale=1.0,
                                       maximum-scale=1.0,
                                       user-scalable=no">
    <title>商品庫存管理系統-商品詳細資料</title>
  <!-- 新 Bootstrap 核心 CSS 檔案 -->
  <link href="../css/bootstrap.min.css" rel="stylesheet">
  <!-- 可選的Bootstrap主題檔案（一般不使用） -->
  <script src="../css/bootstrap-theme.min.css"></script>
  <!-- jQuery檔案。務必在bootstrap.min.js 之前引入 -->
  <script src="../js/jquery-2.1.1.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 檔案 -->
  <script src="../js/bootstrap.min.js"></script> <!--匯入bootstrap的js-->
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
        <li><a href="../logout.php">登出系統</a></li> <!--連結-->
      </ul>

    </div>
  </div>
  <!--以上為Nav Bar-->

  <table class="table table-bordered table-hover" align="center" style="width:900px">
    <thead>
      <tr>
        <th>
          <h3 align="center"><?php echo $row_RecPhoto["category_title"];?></h3>
          <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
            <tr valign="top">
              <td>
                <div class="row"> 
                  <div class="col-lg-12">
                    <div class="thumbnail">
                    <img src="shops/<?php echo $row_RecPhoto["ap_picurl"];?>" style="width:100%;height:100%" />
                    </div>
                    <div class="caption" align="center"> 
                      <label class="labelstyle">
                        <?php echo $row_RecPhoto["ap_subject"];?>
                      </label>
                      <p align="center">
                        <?php echo $row_RecPhoto["ap_desc"];?>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row" align="center">
                <div class="col-lg-12" style="padding:7px 0 7px 0">
                <a href="albumshow.php?id=<?php echo $row_RecPhoto["category_id"];?>" class="btn btn-primary" >回上一頁</a>
                </div>
             </div>

              </td>
            </tr>
          </table>
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
