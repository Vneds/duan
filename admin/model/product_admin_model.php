<?php
    function add_product(){
        global $conn;
        $sql = "INSERT INTO product (product_name , catergory_id,product_price, des, image_path ) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $des = "view/img/shop/". basename($_FILES["img"]['name']);
        $file = $_FILES["img"]["name"];
        move_uploaded_file($file, $des);
        $stmt ->execute([$_POST['product_name'],$_POST['catergory_id'], $_POST['product_price'], $_POST['des'], $_FILES["img"]['name']]);
        header ('location: ./index.php?page=product&action=list');
    }

    function update_product(){
        global $conn;
        $sql = 'UPDATE product SET product_name = ? , catergory_id = ?, product_price = ? , des = ?  WHERE id = '. $_GET['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['product_name'],$_POST['catergory_id'], $_POST['product_price'], $_POST['des']]);
        header ('location: ./index.php?t&action=list');
    }

    function delete_product(){
        global $conn;
        $stmt = $conn->prepare('DELETE FROM product WHERE id = ?');
        $stmt->execute([$_GET['id']]);
        header('Location: ./admin.php');
    }
?>