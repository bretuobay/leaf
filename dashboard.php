<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['logged_in'])){
    header('location:front_app.php');
    exit;
}

 require_once 'views/header.php';
 require_once 'views/dashboard/back.php';
 require_once 'views/footer.php';
 
