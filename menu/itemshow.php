<?php

require_once "connMysql.php";
//預設每頁筆數
$pageRow_records = 8;
//預設頁數
$num_pages = 1;
//若已經有翻頁，將頁數更新
if (isset($_GET['page'])) {
  $num_pages = $_GET['page'];
}
//本頁開始記錄筆數 = (頁數-1)*每頁記錄筆數
$startRow_records = ($num_pages - 1) * $pageRow_records;
//未加限制顯示筆數的SQL敘述句
$query_RecAlbum = "SELECT `category`.`category_id` , `category`.`category_title` , `item`.`ap_picurl` , count( `item`.`ap_id` ) AS `albumNum` FROM `category` LEFT JOIN `item` ON `category`.`category_id` = `item`.`category_id` GROUP BY `category`.`category_id` , `category`.`category_title`";
//加上限制顯示筆數的SQL敘述句，由本頁開始記錄筆數開始，每頁顯示預設筆數
$query_limit_RecAlbum = $query_RecAlbum . " LIMIT " . $startRow_records . ", " . $pageRow_records;
//以加上限制顯示筆數的SQL敘述句查詢資料到 $RecAlbum 中
$RecAlbum = mysql_query($query_limit_RecAlbum);
//以未加上限制顯示筆數的SQL敘述句查詢資料到 $all_RecAlbum 中
$all_RecAlbum = mysql_query($query_RecAlbum);
//計算總筆數
$total_records = mysql_num_rows($all_RecAlbum);
//計算總頁數=(總筆數/每頁筆數)後無條件進位。
$total_pages = ceil($total_records / $pageRow_records);
?>
<html>
<head>
<meta name="viewport" content="width=device-width,
                                       initial-scale=1.0,
                                       maximum-scale=1.0,
                                       user-scalable=no">
<title>商品庫存管理系統-庫存預覽</title>
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

  <table class="table table-bordered table-hover" align="center" style="width:900px">
    <thead>
      <tr>
        <th>
          <h3 align="center">庫存預覽</h3>

          <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0">
            <tr valign="top">
              <td>
                <h4>項目總數:<?php echo $total_records;?></h4>
                
                <?php while ($row_RecAlbum = mysql_fetch_assoc($RecAlbum)) {?>
                <div class="col-lg-4">
                  <div class="thumbnail">
                    <a href="albumshow.php?id=<?php echo $row_RecAlbum["category_id"];?>">
                      <?php if ($row_RecAlbum["albumNum"]==0 ) {?><img src="images/nopic.png" alt="暫無圖片"style="width:250px;height:250px" />
                      <?php } else {?><img src="shops/<?php echo $row_RecAlbum["ap_picurl"];?>" alt="<?php echo $row_RecAlbum["category_title"];?>" style="width:250px;height:250px" />
                      <?php }?>
                    </a>
                  </div>

                  <div class="row" align="center">
                   <label class="control-label col-lg-12 labelstyle">
                    <a href="albumshow.php?id=<?php echo $row_RecAlbum["category_id"];?>"><?php echo $row_RecAlbum["category_title"];?></a>
                  </label>
                </div>  

                <div class="row" align="center">
                  <label class="control-label labelstyle">共 <?php echo $row_RecAlbum["albumNum"];?>種</label>
                </div>

              </div>           
              <?php }?>

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
