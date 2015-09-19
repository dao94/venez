<?php 
session_start();
require_once('../include/class.admincp.php');
$sp = new Categories();
if($_SESSION['ulevel'] != 6)
  header('Location:../');
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap 101 Template</title>
    <meta charset="utf8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet"/>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="http://momentjs.com/downloads/moment.min.js"></script>
  </head>
  <body>
    <div class="wrap-page">
      <div class="container">
        <div class="menu ">
          <nav class="navbar navbar-inverse" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="file:///C:/Users/Nguyen/Downloads/bootstrap-3.0.2-dist/bootstrap-3.0.2-dist/ex/images/logo.png" height="17px" width="74px"></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b class="glyphicon glyphicon-user"></b> <?php echo $_SESSION['userInfo']['username']?><b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Thông tin cá nhân</a></li>
                    <li><a href="../index.php?page=logout">Đăng xuất</a></li>
                  </ul>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </nav>

        </div><!-- end  .menu-->
        <div class="col-md-3 sidebar-menu">
          <div class="panel-group" id="accordion">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                    Danh mục menu
                  </a>
                </h4>
              </div>
              <div id="collapseOne" class="panel-collapse collapse in">
                <div class="panel-body">
                  <ul>
                    <li><a href="index.php"><b class="glyphicon glyphicon-home"></b> Tổng quan</a></li>
                    <li class="dropdown"><a href="index.php?action=cat"><b class="glyphicon glyphicon-bookmark"></b> Loại</a>

                    </li>
                    <li><a href="index.php?action=product"><b class="glyphicon glyphicon-list-alt"></b> Sản phẩm</a>
                        <ul>
                            <li><a href="index.php?action=add_product"><b class="glyphicon glyphicon-plus"></b> Thêm sản phẩm</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php?action=order"><b class="glyphicon glyphicon-shopping-cart"></b> Đơn hàng</a></li>
                    <li><a href="index.php?action=news"><b class="glyphicon glyphicon-pencil"></b> Tin tức</a>
                    <ul>
                            <li><a href="index.php?action=add_news"><b class="glyphicon glyphicon-plus"></b> Thêm tin tức</a></li>
                        </ul>
                    </li>
                    <li><a href="index.php?action=members"><b class="glyphicon glyphicon-user"></b> Quản lý thành viên</a></li>
                    <li><a href="index.php?action=setting"><b class="glyphicon glyphicon-wrench"></b> Cài đặt</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div><!-- end menu-->
        <div class="content col-md-9">
          <?php 
            $action = @$_GET['action'];
            switch ($action) {
               case 'cat':
               include('inc/cat.php');
               break;
               case 'delete_cat':
               include('inc/delete_cat.php');
               break;
               case 'edit_cat':
               include('inc/edit_cat.php');
               break;
               case 'product':
               include('inc/product.php');
               break;
               case 'add_product':
               include('inc/add_product.php');
               break;
               case'delete_product':
               include('inc/delete_product.php');
               break;
               case'edit_product':
               include('inc/edit_product.php');
               break;
               case'order':
               include('inc/orders.php');
               break;
               case'order_detail':
               include('inc/order_detail.php');
               break;
               case'delete_order':
               include('inc/del_order.php');
               break;
               case'members':
               include('inc/members.php');
               break;
               case'news':
               include('inc/news.php');
               break;
               case'add_news':
               include('inc/add_news.php');
               break;
               default:
               echo "Chào mừng bạn đến với trang quản trị";
               break;
               

            }
            
          ?>
        </div><!-- content-->
      </div><!-- end container-->
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    
    <script src="../lib/tinymce/tinymce.min.js"></script>
    <script type="text/javascript">
        tinymce.init({
            selector: "textarea"
         });
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
