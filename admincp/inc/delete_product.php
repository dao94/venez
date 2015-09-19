<?php
    if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
        $cid=$_GET['id'];
        if($sp->delete_product($cid)){
            echo'xóa thành công.nhấn vào <a href="index.php?action=product"> đây </a>để quay về trang trước';
        }
        else{
            echo'xóa không thành công';
        }
    }
?>