<!-- NAV BAR 專用-->
  <div class="navbar navbar-default">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Store 商品系統</a><!-- NAV 大標，麵包屑-->
    </div>
    <div class="navbar-collapse collapse navbar-responsive-collapse">
      <ul class="nav navbar-nav">
        <li class="active"><a href="./news.php">最新訊息</a></li><!--連結至最新訊息-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">會員中心<b class="caret"></b></a><!--拉條初顯示狀態-->
          <ul class="dropdown-menu"><!--下拉條-->
            <li><a href="./merchant/index.php">商家首頁</a></li><!--連結-->
            <li class="divider"></li><!--分界線-->
            <li><a href="./merchant/change_password_form.php">修改登入密碼</a></li><!--連結-->
            <li><a href="./merchant/update_form.php">修改商家資料</a></li><!--連結-->
          </ul>
        </li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">商品中心<b class="caret"></b></a><!--拉條初顯示狀態-->
          <ul class="dropdown-menu"><!--下拉條-->
            <li><a href="./menu/index.php">管理商品</a></li><!--連結-->
            <li class="divider"></li><!--分界線-->
            <li><a href="./menu/itemadd.php">新增商品</a></li><!--連結-->
            <li><a href="./menu/itemshow.php">預覽商品</a></li><!--連結-->
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!--以上為Nav Bar-->
