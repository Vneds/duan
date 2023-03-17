<?php
        include './connect_db.php';
        $sql = "INSERT INTO product (product_name , product_price , catergory_id,image_path) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $des = "img/shop/". basename($_FILES["img"]['name']);
        $file = $_FILES["img"]["name"];
        move_uploaded_file($file, $des);
        $stmt ->execute([$_POST['name'],$_POST['price'],$_POST['catergory'],$des]);
        header ('location: admin.php');
    ?>