<?php 
    include_once '../model/connect_db.php';
    $page = $_GET['page'];
    switch($page){
        case 'product':
            include_once 'controller/product_controller.php';
            break;
        case 'bill':
            include_once 'controller/bill_controller.php';
            break;
        case 'user':
            include_once 'controller/user_controller.php';
            break;
        default:
            include_once 'view/index.php';
            break;
    }
?>