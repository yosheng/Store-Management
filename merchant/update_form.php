<html>
<head>

<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <meta name="viewport" content="width=device-width,
                                       initial-scale=1.0,
                                       maximum-scale=1.0,
                                       user-scalable=no">

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

<title>商家商品管理系統-個資更改</title>
<script language="javascript">
function check_form() {
  if(document.form1.name.value=="") {
    alert("請填寫姓名!");
    return false;
  }
  return confirm('確定送出嗎？');
}
</script>
</head>
<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0"><!--body基礎配置-->
 <!-- NAV BAR 專用-->
<?php
require_once "mctnavbar.php";
?>
<?php
header("Content-Type: text/html; charset=utf-8");
require_once "../connMysql.php";
session_start();
//檢查是否已登入
require_once "../login_check.php";
//查詢登入會員資料
$sql    = "SELECT * FROM merchant WHERE mct_account='" . $_SESSION["account"] . "'";
$record = mysql_query($sql);

$row = mysql_fetch_assoc($record);
?>
        <li><a>使用者：<?php echo $row["mct_account"];?></a></li><!--顯示使用者id-->
        <li><a href="../logout.php">登出系統  </a></li><!--連結-->
      </ul>

    </div>
  </div>
  <!--以上為Nav Bar-->

<table class="table table-bordered table-hover" align="center" style="width:700px"><!--table的tr表格基本配置-->
  <thead>
    <tr>
      <th>
      <form action="member_update.php" class="form-horizontal" method="POST" enctype="multipart/form-data" name="form1" onSubmit="return check_form();">
        <h3 align="center">修改會員資料</h3><!--align配置-->
          <hr size="1" />
          <div class="form-group">
            <label class="col-lg-2 control-label">使用帳號</label>
            <div class="col-lg-10">
            <input name="account" type"text" class="form-control" value="<?php echo $row["mct_account"];?>" disabled="true"><!--input輸出格-->
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">商家名稱</label>
            <div class="col-lg-10">
            <input name="name" type="text" class="form-control" value="<?php echo $row["mct_name"];?>"><!--input輸出格-->
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">電　　話</label>
            <div class="col-lg-10">
            <input name="telephone" type="text" class="form-control" value="<?php echo $row["mct_telephone"];?>"><!--input輸出格-->
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">住　　址</label>
            <div class="col-lg-10">
            <input name="address" type="text" class="form-control" value="<?php echo $row["mct_address"];?>" size="40"><!--input輸出格-->
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">備註</label>
            <div class="col-lg-10">
            <textarea name="memo" class="form-control"><?php echo $row["mct_memo"];?></textarea><!--textarea輸出格-->
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-2 control-label">商家圖片</label>
            <div class="col-lg-10">
            <input type="file" class="btn btn-danger" name="picture" id="picture"><!--瀏覽檔案取照片-->
            </div>
          </div>


          <p><font color="#FF0000">*</font> 表示為必填的欄位</p><!--p文字顯示-->
          <p align="center">
          <input name="id" type="hidden" value="<?php echo $row["mct_id"];?>">
          <input type="submit" name="update" class="btn btn-primary" value="修改資料"><!--確認修改密碼按鈕-->
          <input type="reset" name="reset" class="btn btn-primary" value="重設資料"><!--清空按鈕-->
        </p>
        </div>
      </form>
      </th>
    </tr>
  </thead>
</table>
<br>
<div class="container"></div>
<!-- FOOTER 專用-->
<?php
require_once "../footbar.php";
?>
</body>
</html>
