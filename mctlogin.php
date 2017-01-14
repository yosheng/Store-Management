<?php 
  header("Content-Type: text/html; charset=utf-8");
  require_once("connMysql.php");
  session_start();
  //檢查是否登入，若已登入，導向最新訊息
  if(isset($_SESSION["account"]) && ($_SESSION["account"]!=""))
    header("Location: news.php");
  //執行會員登入
  if(isset($_POST["account"]) && isset($_POST["password"])) {   
    //查詢登入會員資料
    $sql = "SELECT * FROM merchant WHERE mct_account='".$_POST["account"]."'";
    $record = mysql_query($sql);
    //取出帳號密碼值
    $row = mysql_fetch_assoc($record);
    $account = $row["mct_account"];
    $password = $row["mct_password"];
    //對比密碼，若成功則登入
    if($_POST["password"]==$password) {
      //登入帳號存入Session
      $_SESSION["account"] = $account;
      //將使用者帳號密碼存入Cookie
      if(isset($_POST["rememberme"]) && ($_POST["rememberme"]=="true")) {
        setcookie("account", $_POST["account"], time()+365*24*60*60);
        setcookie("password", $_POST["password"], time()+365*24*60*60);
      } else {
        if(isset($_COOKIE["account"])) {
          setcookie("account", $_POST["account"], time()-100);
          setcookie("password", $_POST["password"], time()-100);
        }
      }
      header("Location: news.php");
    } else {
      header("Location: index.php?loginFail=true");
    }
  }
?>