<?php
require_once('connection.php');
session_start();
if (!isset($_SESSION['username'])){
   header('location:login.php');
   exit(); // Thêm exit để dừng script sau khi chuyển hướng
}

if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
    } else {
        $action = 'index';
    }
} else {
    $controller = 'home';  // Thay đổi từ 'sanpham' sang 'home'
    $action = 'index';
}

require_once('routes.php');
