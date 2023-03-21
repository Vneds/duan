<?php 
    $page = $_GET['page'];
    switch($page){
        case 'shop':
            include_once 'model/product_model.php';
            include_once 'model/catergory_model.php';
            include_once 'view/shop.php';
            break;
        case 'detail':
            include_once 'model/product_model.php';
            include_once 'view/detail.php';
            break;
        case 'cart':
            break;
        case 'checkout':
            break;
        default:
            include_once 'view/index.php';
            break;
    }
?>

