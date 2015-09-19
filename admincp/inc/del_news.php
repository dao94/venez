<?php
    if(isset($_GET['id']) && filter_var($_GET['id'],FILTER_VALIDATE_INT,array('min_range'=>1))){
        $cid=$_GET['id'];
        if($sp->DelNews($cid)){
            header('Location: index.php?action=news');
        }
    }
?>