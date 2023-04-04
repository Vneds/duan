<?php 
    session_start();
    include_once 'model/connect_db.php';
    
    function add_product_to_cart($product){
        if (!$_SESSION['cart']) {
            $_SESSION['cart'] = [];
        }

        if (is_exist_in_cart($product['id'])){
            increase_product_quantity($product['id'], $_GET['quantity'], $product['kho_hang']);
            header('location: index.php?page=cart');
            return;
        }
        
        $image_path = 'view/img/shop/' . $product['image_path'];
        $card = [
            'product_name' => $product['product_name'],
            'product_price' => $product['product_price'],
            'image_path' => $image_path,
            'quantity' => $_GET['quantity'],
            'product_id' => $product['id'],
            'stock' => $product['kho_hang'],
        ];
        array_push($_SESSION['cart'], $card);
        header ('location: index.php?page=cart');
    }
    
    function increase_product_quantity($product_id, $quantity, $stock){
        foreach($_SESSION['cart'] as $product){
            if ($product['product_id'] == $product_id){
                $key = array_search($product, $_SESSION['cart']);
                $total_quantity = (int)$quantity  + (int)$stock;
                if ($total_quantity > $stock) {
                    $total_quantity = $stock;
                }
                $product['quantity'] = $total_quantity;
                $_SESSION['cart'][$key] = $product;
                break;
            }
        }
    }


    function is_exist_in_cart($product_id){
        foreach($_SESSION['cart'] as $product){
            if ($product['product_id'] == $product_id){
                return true;
            }
        }
        return false;
    }


    function remove_product_from_cart(){
        unset($_SESSION["cart"][$_GET["index"]]);
        $_SESSION["cart"]= array_values($_SESSION["cart"]);
        header ('location: index.php?page=cart');
    }
?>