<?php 
    include_once 'model/connect_db.php';
    
    $page = $_GET['page'];
    switch($page){
        case 'shop':
            include_once 'model/product_model.php';
            include_once 'model/catergory_model.php';
            include_once 'view/shop.php';
            break;
        case 'detail':
            include_once 'model/product_model.php';
            include_once 'model/comment_model.php';
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
            include_once 'view/contact.php';
            break;
        case 'login':
            include_once 'view/login.php';
            break;
        case 'signup':
            include_once 'view/signup.php';
            break;
        case 'forgot':
            include_once 'view/forgot.php';
            break;
        case 'login_add':
            include_once 'model/login_add.php';
            break;
        case 'user':
            include_once 'model/user_model.php';
            include_once 'view/user.php';
            break;
        case 'user_bill':
            include_once 'view/user_bill.php';
            break;
        case 'update_pass':
            include_once 'view/update_pass.php';
            break;
        case 'blog':
            include_once 'view/blog.php';
            break;
            
        default:
            include_once 'view/index.php';
            break;
    }
?>