<?php
    ob_start();
    session_start(); 
    require('include/functions.php');
    require('include/class.admincp.php');
    $view = new Categories();
    $db = new Config();
    require('views/header.php');
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        switch ($page) {

           case 'danhsachsp':
           include('views/danhsachsp.php');
           break;

           case 'sanpham':
           include('views/sanpham.php');
           break;

           case 'add_cart':
           include('views/addtocart.php');
           break;

           case 'del_cart':
           include('views/del_cart.php');
           break;

           case 'giohang':
           include('views/view_cart.php');
           break;

           case 'thanhtoan':
           include('views/checkout.php');
           break;

           case 'logout':
           include('views/logout.php');
           break;

           case 'gioithieu':
           include('views/introduce.php');
           break;

           case'lienhe':
           include('views/lienhe.php');
           break;

           case'tintuc':
           include('views/tintuc.php');
           break;

           case 'fqa':
             include('views/hoidap.php');
             break;
           default:
           include('views/home.php');
           break;
        }
    }else{
        include('views/home.php');
    }
    
    require('views/sidebar.php');
    require('views/footer.php');
    
?>