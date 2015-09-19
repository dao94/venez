<?php 
    if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
        $cid = $_GET['id'];
        if($sp->Del_Category($cid)){
            echo 'Xóa thành công . nhấn vào <a href="index.php?action=cat">đây</a> để quay lại trang trước ';
        }else{
            echo 'Lỗi ! không thể xóa';
        }
    }
?>