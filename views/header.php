<!DOCTYPE html>
<html>
  <head>
  	<meta charset="utf-8" />
    <title>Venez beautes - Đẹp từng minimet!</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <link href="css/style.css" rel="stylesheet" media="screen" />
  </head>
  <body>
    <div class="header">
      <div class="top_nav">
        <div class="container">
          <div class="row">
            <div class="col-md-8"></div>
            <div class="col-md-4">
            <?php 
                if (isset($_SESSION['uid']) && !empty($_SESSION['uid'])) {
                    $num = 0;
                    if (isset($_SESSION['cart'])) {
                        $num = count($_SESSION['cart']);
                    }
                    echo "Xin chào <a href=''>". $_SESSION['userInfo']['username']."</a> | Giỏ hàng : <a href=''>".$num."</a> sản phẩm | <a href='index.php?page=logout'>Đăng xuất</a>";
                }else{
                    echo '<span class="glyphicon glyphicon-user"></span><a href="" data-toggle="modal" data-target="#loginModal"> Đăng nhập</a> hoặc <a href=""  data-toggle="modal" data-target="#registerModal">đăng ký tài khoản </a>';
                }
            ?>  
              
            
            </div>
          </div>
        </div>
      </div><!-- end top-nav-->
      <div class="main_nav">
        <div class="container">
          <nav class="navbar navbar-default main-menu" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand logo" href="index.php"><img src="images/logo.png" alt="LOGO" /></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right menu">
                <li <?php echo !isset($_GET['page']) ? 'class="active"' : '';?> >
                  <a href="index.php">Trang chủ</a>
                </li>
                <li <?php echo (isset($_GET['page']) && $_GET['page'] == 'gioithieu') ? 'class="active"' : '';?> >
                  <a href="index.php?page=gioithieu">Giới thiệu</a>
                </li>
                <li <?php echo (isset($_GET['page']) && $_GET['page'] == 'danhsachsp') ? 'class="active"' : '';?>>
                  <a href="index.php?page=danhsachsp">Sản phẩm</a></li>
                <li <?php echo (isset($_GET['page']) && $_GET['page'] == 'tintuc') ? 'class="active"' : '';?>>
                  <a href="index.php?page=tintuc">Tin tức</a>
                </li>
                <li <?php echo (isset($_GET['page']) && $_GET['page'] == 'fqa') ? 'class="active"' : '';?>>
                  <a href="index.php?page=fqa">Hỏi đáp</a>
                </li>
                <li <?php echo (isset($_GET['page']) && $_GET['page'] == 'lienhe') ? 'class="active"' : '';?>>
                  <a href="index.php?page=lienhe">Liên hệ</a>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </nav>
        </div>
      </div><!-- end main-nav-->
      <div class="slide">
          <div data-ride="carousel" class="carousel slide" id="carousel-example-generic">
                <ol class="carousel-indicators">
                  <li class="" data-slide-to="0" data-target="#carousel-example-generic"></li>
                  <li data-slide-to="1" data-target="#carousel-example-generic" class=""></li>
                  <li data-slide-to="2" data-target="#carousel-example-generic" class="active"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="item">
                    <img alt="First slide" data-src="holder.js/900x500/auto/#777:#555/text:First slide" src="images/0.png" width="100%" height="300px"/>
                  </div>
                  <div class="item">
                    <img alt="Second slide" data-src="holder.js/900x500/auto/#666:#444/text:Second slide" src="images/0.png" width="100%">
                  </div>
                  <div class="item active">
                    <img alt="Third slide" data-src="holder.js/900x500/auto/#555:#333/text:Third slide" src="images/0.png" width="100%">
                  </div>
                </div>
              </div>
      </div>
      <div class="clearfix"></div>
    </div><!-- end header-->
    <div class="clearfix"></div>