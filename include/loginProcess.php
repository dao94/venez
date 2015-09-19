<?php
    ob_start();
    session_start();
    include('class.admincp.php');
    $login = new Categories();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['username'];
        $pass = $_POST['password'];
        if ($login->login($user,$pass)) {
            echo 'done';
        }else{
            echo 'notmatch';
        }
    }else{
        echo 'false';
    }
?>