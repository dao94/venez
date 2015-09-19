<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['masp'])){
        $masp = $_POST['masp'];
        $sl = $_POST['qty'];
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        if (isset($_SESSION['cart'][$masp])) {
            $_SESSION['cart'][$masp]['qty'] += $sl;
        }else{
            $_SESSION['cart'][$masp]['qty'] = $sl;
        }
        
    }
    header('Location: index.php?page=giohang');
?>