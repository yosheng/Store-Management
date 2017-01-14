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
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- 可選的Bootstrap主題檔案（一般不使用） -->
  <script src="css/bootstrap-theme.min.css"></script>
  <!-- jQuery檔案。務必在bootstrap.min.js 之前引入 -->
  <script src="js/jquery-2.1.1.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 檔案 -->
  <script src="js/bootstrap.min.js"></script><!--匯入bootstrap的js-->
  <link rel="stylesheet" href="css/bootswatch.min.css"><!--匯入bootstrap的css-->
  <link rel="shortcut icon" href="favicon.ico"><!--favicon顯示-->
</head>

<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
 <!-- NAV BAR 專用-->
<?php
require_once "mctnavbar.php";
?>
<div class="message">
<table class="table" style="width:400px" align="center">
  <tr valign="top"><!--valign的配置-->
    <td >
      <h3 align="center">商家登入</h3><!--擡頭的配置-->
      <hr align="center" size="2" />
      <form name="form1" method="post" action="mctlogin.php" class="form-horizontal" >
        <h5>帳號：</h5><!--h5文字顯示-->
          <input name="account" class="form-control" type="text" value="<?php if(isset($_COOKIE["account"])) 
{ 
echo $_COOKIE["account"]; 
} ?>"><!--帳號輸入-->
        </p>
        <h5>密碼：</h5><!--h5文字顯示-->
          <input name="password" class="form-control" type="password" value="<?php if(isset($_COOKIE["password"])) 
{ 
echo $_COOKIE["password"]; 
} ?>"><!--密碼輸入-->
        </p>
        <p><input name="rememberme" type="checkbox" value="true" checked>記住我的帳號密碼。</p><!--記住帳密勾勾-->
        <div class="col-lg-6">
          <input type="submit" class="btn btn-primary" name="login" value="登入"><!--登入按鈕-->
        </div>
          <h6 align="center"><a href="register_form.php" class="btn btn-success col-lg-6">馬上申請會員</a></h6>
      </form>  
    </td>
  </tr>
</table>
</div>
<!-- FOOTER 專用-->
<?php
require_once "footbar.php";
?>

</body>
</html>
