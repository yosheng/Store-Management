<?php
require_once "connMysql.php";

// 更新相簿
if (isset($_POST["action"]) && ($_POST["action"] == "update")) {

  //更新相簿資訊
  $query_update = "UPDATE `category` SET ";
  $query_update .= "`category_title`='" . $_POST["category_title"] . "'";
  $query_update .= "WHERE `category_id`=" . $_POST["category_id"];
  mysql_query($query_update);

  //更新照片資訊
  for ($i = 0; $i < count($_POST["ap_id"]); $i++) {
    $query_update = "UPDATE `item` SET ";
    $query_update .= "`ap_subject`='" . $_POST["update_subject"][$i] . "',";
    $query_update .= "`ap_price`='" . $_POST["update_price"][$i] . "',";
    $query_update .= "`ap_desc`='" . $_POST["update_desc"][$i] . "'";
    $query_update .= "WHERE `ap_id`=" . $_POST["ap_id"][$i];

    mysql_query($query_update);
  }
  //執行檔案刪除
  for ($i = 0; $i < count($_POST["delcheck"]); $i++) {
    $delid     = $_POST["delcheck"][$i];
    $query_del = "DELETE FROM `item` WHERE `ap_id`=" . $_POST["ap_id"][$delid];

    mysql_query($query_del);
    unlink("shops/" . $_POST["delfile"][$delid]);
  }
//執行照片新增及檔案上傳
  if ($_FILES["ap_picurl"]["tmp_name"] != "") {
    $query_insert = "INSERT INTO item (category_id, ap_subject, ap_price, ap_desc, ap_picurl) VALUES (";
    $query_insert .= $_POST["category_id"] . ",";
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

  //重新導向回到本畫面
  header("Location: ?id=" . $_POST["category_id"]);
}
//顯示相簿資訊SQL敘述句
$query_RecAlbum = "SELECT * FROM `category` WHERE `category_id`=" . $_GET["id"];
//顯示照片SQL敘述句
$query_RecPhoto = "SELECT * FROM `item` WHERE `category_id`=" . $_GET["id"];
//將二個SQL敘述句查詢資料到 $RecAlbum、$RecPhoto 中
$RecAlbum = mysql_query($query_RecAlbum);
$RecPhoto = mysql_query($query_RecPhoto);
//計算照片總筆數
$total_records = mysql_num_rows($RecPhoto);
//取得相簿資訊
$row_RecAlbum = mysql_fetch_assoc($RecAlbum);
?>
<html>
<head>
  <meta name="viewport" content="width=device-width,
  initial-scale=1.0,
  maximum-scale=1.0,
  user-scalable=no">
  <title>商品庫存管理系統-修改庫存</title>
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

  <table class="table table-bordered table-hover" align="center" style="width:900px" >
    <thead>
      <tr>
        <th>
          <h3 align="center">庫存管理－修改</h3>
          
          <table width="90%" border="0" align="center" cellpadding="4" cellspacing="0" ><!--連結配置-->
           <tr valign="top">
             <td>
              <h4>項目總數：<?php echo $total_records;?></h4>
              <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <div class="row" >
                  <div class="col-lg-12">
                    <label class="col-lg-2 control-label labelstyle">項目名稱</label>
                    <div class="col-lg-10">
                      <input name="category_title" type="text" class="form-control" id="category_title" value="<?php echo $row_RecAlbum["category_title"];?>" />
                      <input name="category_id" type="hidden" class="form-control" id="category_id" value="<?php echo $row_RecAlbum["category_id"];?>" />
                    </div>
                    <hr />
                  </div>                    

                </div>



                <?php
                $checkid = 0;
                while ($row_RecPhoto = mysql_fetch_assoc($RecPhoto)) {
                  ?>
                  <div class="col-lg-4">
                    <p>
                      <div class="thumbnail"> 
                        <img src="shops/<?php echo $row_RecPhoto["ap_picurl"];?>" style="width:250px;height:250px" alt="<?php echo $row_RecPhoto["ap_subject"];?>" />
                        <input name="ap_id[]" type="hidden" id="ap_id[]" value="<?php echo $row_RecPhoto["ap_id"];?>" />
                        <input name="delfile[]" type="hidden" id="delfile[]" value="<?php echo $row_RecPhoto["ap_picurl"];?>">
                      </div>

                      <div class="row">
                        <label class="col-lg-3 control-label labelstyle">名稱</label>
                        <div class="col-lg-9">
                          <input name="update_subject[]" type="text" class="form-control" id="update_subject[]" value="<?php echo $row_RecPhoto["ap_subject"];?>" size="15" />
                        </div>
                      </div>  
                      <p>
                        <div class="row">
                          <label class="col-lg-3 control-label labelstyle">數量</label>
                          <div class="col-lg-9">
                            <input name="update_price[]" type="text" class="form-control" id="update_price[]" value="<?php echo $row_RecPhoto["ap_price"];?>" size="15" />
                          </div>
                        </div>
                      </p>

                      <p>
                        <div class="row">
                          <label class="col-lg-3 control-label labelstyle">描述</label>
                          <div class="col-lg-9">
                            <input name="update_desc[]" type="text" class="form-control " id="update_desc[]" value="<?php echo $row_RecPhoto["ap_desc"];?>" size="15" />
                          </div>
                        </div>
                      </p>

                      <p>
                        <div class="row">
                          <label class="col-lg-3 control-label labelstyle">刪除</label>
                          <div class="col-lg-9" style="padding:7px 0 7px 15px">
                            <input name="delcheck[]" type="checkbox" id="delcheck[]" value="<?php echo $checkid;$checkid++?>" /> 
                          </div>
                        </div>
                      </p>

                    </p>

                  </div>

                  <?php }?>


                  <div class="row">
                    <div class="col-lg-12">
                      <hr />
                      <h4>新增商品</h4>
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <p>
                      <div class="row">
                        <label class="col-lg-2 control-label labelstyle">名稱</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" name="ap_subject" id="ap_subject">
                        </div>
                      </div>
                    </p>

                    <p>
                      <div class="row">
                        <label class="col-lg-2 control-label labelstyle">數量</label>
                        <div class="col-lg-10">
                          <input type="text" class="form-control" name="ap_price" id="ap_price">
                        </div>
                      </div>
                    </p>

                    <p>
                      <div class="row">
                        <label class="col-lg-2 control-label labelstyle">說明</label>
                        <div class="col-lg-10">
                          <textarea name="ap_desc" class="form-control" id="ap_desc" cols="45" rows="5"></textarea>
                        </div>
                      </div>
                    </p>

                    <p>
                      <div class="row">
                        <label class="col-lg-2 control-label labelstyle">檔名</label>
                        <div class="col-lg-10">
                          <input class="btn btn-danger" class="form-control" type="file" name="ap_picurl" id="ap_picurl" />
                        </div>
                      </div>
                    </p>

                  </div>

                  <p>
                    <font color="#FF0000">*</font>表示為必填的欄位
                  </p>

                  <p align="center">
                    <input name="action" type="hidden" id="action" value="update">
                    <input type="submit" name="button" class="btn btn-primary" id="button" value="確定修改" /><!--bootstrap的button-->
                    <input type="button" name="button2" class="btn btn-primary" id="button2" value="回上一頁" onClick="window.history.back();" /><!--bootstrap的button-->
                  </p>
                </td>
              </tr>
            </table>
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
