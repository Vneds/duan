<?php 
    session_start();
    include_once 'model/connect_db.php';
    
    function add_product_to_cart($product){
        if (!$_SESSION['cart']) {
            $_SESSION['cart'] = [];
        }
        
        $image_path = 'view/img/shop/' . $product['image_path'];
        $card = [
            'product_name' => $product['product_name'],
            'product_price' => $product['product_price'],
            'image_path' => $image_path,
            'quantity' => $_GET['quantity'],
            'product_id' => $product['id']
        ];
        array_push($_SESSION['cart'], $card);
        header ('location: index.php?page=cart');
    }
    
    
    function remove_product_from_cart(){
        unset($_SESSION["cart"][$_GET["index"]]);
        $_SESSION["cart"]= array_values($_SESSION["cart"]);
        header ('location: index.php?page=cart');
    }
?>