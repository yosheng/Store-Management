<?php

require_once "connMysql.php";
//計算點閱數
if (isset($_GET["action"]) && ($_GET["action"] == "hits")) {

  $query_hits = "UPDATE `item` SET `ap_hits`=`ap_hits`+1 WHERE `ap_id`=" . $_GET["id"];
  mysql_query($query_hits);
  header("Location: albumphoto.php?id=" . $_GET["id"]);
}
//顯示商品資訊SQL敘述句
$query_RecAlbum = "SELECT * FROM `category` WHERE `category_id`=" . $_GET["id"];
//顯示商品種類SQL敘述句
$query_RecPhoto = "SELECT * FROM `item` WHERE `category_id`=" . $_GET["id"];
//將二個SQL敘述句查詢資料儲存到 $RecAlbum、$RecPhoto 中
$RecAlbum = mysql_query($query_RecAlbum);
$RecPhoto = mysql_query($query_RecPhoto);
//計算商品種類總筆數
$total_records = mysql_num_rows($RecPhoto);
//取得商品資訊
$row_RecAlbum = mysql_fetch_assoc($RecAlbum);
?>
<html>
<head>
<meta name="viewport" content="width=device-width,
                                       initial-scale=1.0,
                                       maximum-scale=1.0,
                                       user-scalable=no">
    <title>商品庫存管理系統-種類預覽</title>
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
<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
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
        <li><a href="../logout.php">登出系統</a></li><!--連結-->
      </ul>

    </div>
  </div>
  <!--以上為Nav Bar-->
  <table class="table table-bordered table-hover" align="center" style="width:900px">
    <thead>
      <tr>
        <th>
          <h3 align="center"> <?php echo $row_RecAlbum["category_title"];?></h3>
          <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
            <tr valign="top">
              <td>
                <h4>項目總數：<?php echo $total_records;?></h4>

                <?php while ($row_RecPhoto = mysql_fetch_assoc($RecPhoto)) {?>
                <div class="col-lg-4">
                  <div class="thumbnail">
                    <a href="?action=hits&id=<?php echo $row_RecPhoto["ap_id"];?>">
                      <img src="shops/<?php echo $row_RecPhoto["ap_picurl"];?>" alt="<?php echo $row_RecPhoto["ap_subject"];?>" style="width:250px;height:250px" />
                    </a>
                  </div>

                  <div class="row" align="center">
                   <label class="control-label col-lg-12 labelstyle">
                    <a href="?action=hits&id=<?php echo $row_RecPhoto["ap_id"];?>"><?php echo $row_RecPhoto["ap_subject"];?></a>
                  </label>
                </div> 

                <div class="row" align="center">
                  <span class="pricetext">數量：<?php echo $row_RecPhoto["ap_price"];?></span>
                </div>

                <div class="row" align="center">
                  <span class="smalltext">點閱次數：<?php echo $row_RecPhoto["ap_hits"];?></span>
                </div>
              </div>
              <?php }?>

              <div class="row" align="center">
                <div class="col-lg-12" style="padding:7px 0 7px 0">
                 <a href="itemshow.php" class="btn btn-primary">回預覽頁</a>
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
