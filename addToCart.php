<?php 
    session_start();
    include './connect_db.php';
    $sql = ' SELECT * FROM product WHERE id = ' . $_GET['id'];
    $product = $conn->query($sql)->fetch();

    if (!$_SESSION['cart']) {
        $_SESSION['cart'] = [];
    }
    

    $image_path = 'img/shop/' . $product['image_path'];
    $card = [
        'product_name' => $product['product_name'],
        'product_price' => $product['product_price'],
        'image_path' => $image_path,
        'quantity' => $_GET['quantity']
    ];
    
    array_push($_SESSION['cart'], $card);

    print_r($_SESSION['cart']);

?>