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
        $error_arr = [];
        switch($_POST['action']){
            case 'add':
                add_product();
                break;
            case 'edit':
                if (is_validate()){
                    update_product();
                    return;
                }
                save_error();
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
        $sql = 'UPDATE product SET product_name = ? , catergory_id = ?, product_price = ? , des = ?, kho_hang = ?  WHERE id = '. $_POST['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['product_name'],$_POST['catergory_id'], $_POST['product_price'], $_POST['des'], $_POST['stock']]);
        header ('location: ../index.php?page=product&action=list');
    }

    function delete_product($id){
        global $conn;
        $stmt = $conn->prepare('DELETE FROM product WHERE id = ?');
        $stmt->execute([$id]);
        header ('location: ../index.php?page=product&action=list');
    }

    function is_validate(){
        if ((int)$_POST['stock'] < 0){
            return false;
        }
        if ((int)$_POST['product_price'] < 0){
            return false;
        }
        if (empty($_POST['catergory_id'])){
            return false;
        }
        return true;
    }

    function save_error(){
        global $error_arr;
        if ((int)$_POST['stock'] < 0){
            $error_stock = 'Vui lòng nhập số dương';
            $arr1 = [
                'error_name' =>  'error_stock',
                'error_value' => $error_stock
            ];
            array_push($error_arr , $arr1);
        }
        if ((int)$_POST['product_price'] < 0){
            $error_price = 'Vui lòng nhập số dương';
            $arr2 = [
                'error_name' =>  'error_price',
                'error_value' => $error_price
            ];
            array_push($error_arr , $arr2);
        }

        if (empty($_POST['catergory_id'])){
            $error_catergory = 'Vui lòng chọn danh mục';
            $arr3 = [
                'error_name' =>  'error_catergory',
                'error_value' => $error_catergory
            ];
            array_push($error_arr , $arr3);
        }
        $query_param = '';
        foreach ($error_arr as $n){
            // print_r($n);
            // echo $n['error_name'] . '='. $n['error_value'] . '&';
            $string = $n['error_name'] . '='. $n['error_value'] . '&';
            $query_param .= $string;
        }
        header ('location: ../index.php?page=product&action=edit&id='. $_POST['id'] . '&' . $query_param);
    }

?>