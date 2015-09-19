<?php
    ob_start();
    session_start();
    include('class.admincp.php');
    $login = new Categories();
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = $_POST['username'];
        $pass = md5($_POST['password']);
        $firstname = ($_POST['firstname']);
        $lastname = ($_POST['lastname']);
        $address = ($_POST['address']);
        $email = ($_POST['email']);
        $phone = ($_POST['phone']);
        $birthday = ($_POST['birthday']);
        $sex = ($_POST['sex']);
        if ($login->register($firstname,$lastname,$address,$email,$phone,$birthday,$sex,$user,$pass)) {
            echo 'done';
        }else{
            echo 'notmatch';
        }
    }else{
        echo 'false';
    }
?>