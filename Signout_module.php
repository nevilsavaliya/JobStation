<?php
session_start();
if(isset($_SESSION['access_token'])) {
    unset($_SESSION['access_token']);
    session_destroy();
    if (isset($_COOKIE[session_name()])) {
        setcookie(session_name(), '', time() - 3600, '/');
    }
    header('location:login.php');
}
if(isset($_SESSION['ID'])){
    unset($_SESSION['ID']);
    session_destroy();
    header('location:login.php');
}

?>