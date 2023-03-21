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
            include_once 'view/cart.php';
            break;
        case 'cart_add':
            include_once 'model/cart_model.php';
            include_once 'model/product_model.php';
            $product = get_product_with_ID($_GET['id']);
            add_product_to_cart($product);
            break;
        case 'cart_delete':
            include_once 'model/cart_model.php';
            remove_product_from_cart();
            break;
        case 'checkout':
            include_once 'model/bill_model.php';
            include_once 'view/checkout.php';
            break;
        case 'contact':
            break;
        case 'login':
            include_once 'view/login.php';
        case 'login_add':
            include_once 'model/login_add.php';
            break;
        case 'admin':
            include_once 'admin/index.php';
            break;
        case 'admin_product':
            include_once 'model/product_model.php';
            include_once 'model/catergory_model.php';
            include_once 'admin/admin_product.php';
            break;
        case 'admin_product_add':
            include_once 'model/catergory_model.php';
            include_once 'admin/admin_product_add.php';
            break;
        case 'admin_add_product':
            include_once 'admin/view/product/add.php';
            break;
        case 'admin_bill':
            include_once 'admin/admin_bill.php';
            break;
        default:
            include_once 'view/index.php';
            break;
    }
?>