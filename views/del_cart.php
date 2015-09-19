<?php 
    if (isset($_GET['id'])) {
        $id = floor($db->db->real_escape_string($_GET['id']));
        unset($_SESSION['cart'][$id]);
        header('Location: index.php?page=giohang');
    }else{
        unset($_SESSION['cart']);
        header('Location: index.php?page=giohang');
    }
    
?>