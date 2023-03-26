<?php
    include_once '../model/connect_db.php';
    // GET hiển thị UI
    if (isset($_GET['action'])){
        switch($_GET['action']){
            case 'list':
                include_once '../model/product_model.php';
                include_once '../model/catergory_model.php';
                include_once 'view/product/list.php';
                break;
            case 'add':
                include_once '../model/catergory_model.php';
                include_once 'view/product/add.php';
                break;
            case 'edit':
                include_once '../model/product_model.php';
                include_once '../model/catergory_model.php';
                $product = get_product_with_ID($_GET['id']);
                $image_path = get_image_path($product['image_path']);
                include_once 'view/product/edit.php';
                break;
          
        }
    }



    //POST thực hiện insert, update, detele
    if (isset($_POST['action'])){
        // include_once '../model/product_model.php';
        switch($_POST['action']){
            case 'add':
                add_product();
                break;
            case 'edit':
                update_product();
                break;
            case 'delete':
                delete_product($_POST['id']);
                break;
        }
    }

    function add_product(){
        global $conn;
        $sql = "INSERT INTO product (product_name , catergory_id,product_price, des, image_path ) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $des = "../../view/img/shop/". $_FILES["img"]['name'];
        if(move_uploaded_file($_FILES["img"]["tmp_name"], $des)){
            $stmt ->execute([$_POST['product_name'],$_POST['catergory_id'], $_POST['product_price'], $_POST['des'], $_FILES["img"]['name']]);
            header ('location: ../index.php?page=product&action=list');
        } 
    }

    function update_product(){
        global $conn;
        $sql = 'UPDATE product SET product_name = ? , catergory_id = ?, product_price = ? , des = ?  WHERE id = '. $_POST['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['product_name'],$_POST['catergory_id'], $_POST['product_price'], $_POST['des']]);
        header ('location: ../index.php?page=product&action=list');
    }

    function delete_product($id){
        global $conn;
        $stmt = $conn->prepare('DELETE FROM product WHERE id = ?');
        $stmt->execute([$id]);
        header ('location: ../index.php?page=product&action=list');
    }
?>