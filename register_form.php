<html>
<head>
  <meta content="text/html; charset=utf-8" http-equiv="Content-Type">
  <meta name="viewport" content="width=device-width,
  initial-scale=1.0,
  maximum-scale=1.0,
  user-scalable=no">

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

  <title>商家商品管理系統-註冊頁面</title>
  <script language="javascript">
    function check_form() {
      var acct = document.form1.account.value;
      if(acct=="") {
        alert("請填寫帳號!");
        return false;
      }
      if(acct.length<5 || acct.length>20){
        alert( "您的帳號長度只能5至20個字元!");
        return false;
      }
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
      if(document.form1.name.value=="") {
        alert("請填寫姓名!");
        return false;
      }
      if(document.form1.email.value=="") {
        alert("請填寫電子郵件!");
        return false;
      }
      return confirm("確定送出？");
    }
  </script>
</head>
<body topmargin="0" leftmargin="0" marginwidth="0" marginheight="0">
 <!-- NAV BAR 專用-->
 <?php
 require_once "mctnavbar.php";
 ?>
 <table class="table table-bordered table-hover" align="center" style="width:700px">
  <thead>
    <tr>
      <th>
        <form name="form1" class="form-horizontal" method="post" enctype="multipart/form-data" action="register.php" onSubmit="return check_form();">
            <h3 align="center">註冊商家</h3>
          <hr size="1" />
            <?php if (isset($_GET[ "registered"])) {?>
            <!--讀取判斷帳號是否已使用-->
            <div>帳號
              <?php echo $_GET[ "account"];?>已經有人使用！</div>
              <?php }?>
              <div class="form-group">
                <label class="col-lg-2 control-label">使用帳號</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="account">
                  <!--input輸入格-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">使用密碼</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" name="password1">
                  <!--input輸入格-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">確認密碼</label>
                <div class="col-lg-10">
                  <input type="password" class="form-control" name="password2">
                  <!--input輸入格-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">商家名稱</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="name">
                  <!--input輸入格-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">電　　話</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="telephone">
                  <!--input輸入格-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">住　　址</label>
                <div class="col-lg-10">
                  <input type="text" class="form-control" name="address">
                  <!--input輸入格-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">備註</label>
                <div class="col-lg-10">
                  <textarea name="memo" class="form-control" rows="5"></textarea>
                  <!--textarea輸入格-->
                </div>
              </div>
              <div class="form-group">
                <label class="col-lg-2 control-label">商家圖片</label>
              </p>
              <div class="col-lg-10">
                <input type="file" class="btn btn-danger" name="picture" id="picture">
                <!--瀏覽檔案選取圖片-->
              </div>
            </div>
            <p><font color="#FF0000">*</font> 表示為必填的欄位</p><!--p文字顯示-->
            <p align="center">
              <input type="submit" name="join" class="btn btn-primary" value="新增商家" disabled>
              <!--input輸入格-->
              <input type="reset" name="reset" class="btn btn-primary" value="重設資料">
              <!--clear輸入格-->
            </p>
        </form>
      </th>
    </tr>
  </thead>
</table>
<br>
<div class="container"></div>
<!-- FOOTER 專用-->
<?php
require_once "footbar.php";
?>


</body>
</html>
