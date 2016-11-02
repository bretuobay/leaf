<?php
error_reporting(0);
session_start();
if(isset($_SESSION['logged_in'])){
    header('location:dashboard.php');
    exit;
}

 require_once 'views/header.php';
 require_once 'views/front_app/front.php';
 require_once 'views/footer.php';
