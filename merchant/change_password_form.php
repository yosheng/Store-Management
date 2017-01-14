<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <meta name="viewport" content="width=device-width,
                                       initial-scale=1.0,
                                       maximum-scale=1.0,
                                       user-scalable=no">
  <title>商家商品管理系統-修改密碼</title>


  <script language="javascript">
  function check_form() {
    var pw1 = document.form1.password1.value;
    var pw2 = document.form1.password2.value;
    if(pw1=="") {
      alert("密碼不可以空白!");
      return false;
    }
    for(var i=0; i<pw1.length; i++) {
      if(pw1.charAt(i)==" " || pw1.charAt(i)=="\"") {
        alert("密碼不可以含有空白或雙引號!\n");
        return false;
      }
    }
    if(pw1.length<5 || pw1.length>20) {
      alert("密碼長度只能5到20個字元!\n" );
      return false;
    }
    if(pw1!=pw2) {
      alert("兩次輸入密碼不一樣,請重新輸入!\n");
      return false;
    }
  }
  </script>
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
require_once "mctnavbar.php";
?>
<?php
header("Content-Type: text/html; charset=utf-8");
require_once "../connMysql.php";
session_start();
//檢查是否已登入
require_once "../login_check.php";
//查詢登入會員資料
$sql = "SELECT * FROM merchant WHERE mct_account='" . $_SESSION["account"] . "'";
$record = mysql_query($sql);
$row = mysql_fetch_assoc($record);
?>
        <li><a>使用者：<?php echo $row["mct_account"];?></a></li><!--顯示使用者id-->
        <li><a href="../logout.php">登出系統  </a></li><!--連結-->
      </ul>

    </div>
  </div>
  <!--以上為Nav Bar-->
<table class="table" style="width:400px" align="center">
    <!--table表格基本配置-->
    <tr align="center" valign="top">
        <!--table的tr表格基本配置-->
        <td>
            <form action="member_change_password.php" method="POST" name="form1" onSubmit="return check_form();" class="form-horizontal">
                <h3 align="center">修改密碼</font></h3>
                <!--h3文字顯示-->
                <hr align="center" size="2" />
                <div class="form-group">
                    <label class="col-lg-4">新的密碼：</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" name="password1">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-4">確認密碼：</label>
                    <div class="col-lg-8">
                        <input type="password" class="form-control" name="password2">
                    </div>
                </div>
                <hr align="center" size="1" />
                <p align="center">
                    <input name="id" type="hidden" value="<?php echo $row[" id "];?>">
                    <input type="submit" name="change" value="修改密碼" class="btn btn-primary">
                    <input type="reset" name="reset" value="重設資料" class="btn btn-primary">
                </p>
            </form>
        </td>
    </tr>
</table>

<br>
<div class="container"></div>
<!-- FOOTER 專用-->
<?php
require_once "../footbar.php";
?>
</body>
</html>
