<?php
    include_once 'model/connect_db.php';
    echo $_POST['product_name'];
    $sql = "INSERT INTO product (product_name , catergory_id,product_price, des, image_path ) VALUES (?,?,?,?,?)";
    $stmt = $conn->prepare($sql);
    $des = "view/img/shop/". basename($_FILES["img"]['name']);
    $file = $_FILES["img"]["name"];
    move_uploaded_file($file, $des);
    $stmt ->execute([$_POST['product_name'],$_POST['catergory_id'], $_POST['product_price'], $_POST['des']], $_FILES["img"]['name']);
    header ('location: ./index?page=admin_product');
?>