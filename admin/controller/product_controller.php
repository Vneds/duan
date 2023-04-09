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
                if (is_validate_add()){
                    add_product();
                    return;
                }
                save_error_add();
                break;
            case 'edit':
                if (is_validate()){
                    $image_path = get_img_name();
                    update_product($image_path);
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

    function update_product($image_path){
        global $conn;
        $image_path = $image_path ?? get_product_img($_POST['id']);
        $sql = 'UPDATE product SET product_name = ? , catergory_id = ?, product_price = ? , des = ?, kho_hang = ? , image_path = ?  WHERE id = '. $_POST['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['product_name'],$_POST['catergory_id'], $_POST['product_price'], $_POST['des'], $_POST['stock'], $image_path]);
        header ('location: ../index.php?page=product&action=list');
    }

    function delete_product($id){
        global $conn;
        $stmt = $conn->prepare('DELETE FROM product WHERE id = ?');
        $stmt->execute([$id]);
        header ('location: ../index.php?page=product&action=list');
    }

    function is_validate(){
        if (!is_numeric($_POST['stock'])){
            return false;
        }

        if (!is_numeric($_POST['product_price'])){
            return false;
        }

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

    function is_validate_add(){
        if ((int)$_POST['stock'] < 0){
            return false;
        }
        if ((int)$_POST['product_price'] < 0){
            return false;
        }
        if (empty($_POST['catergory_id'])){
            return false;
        }
        if (empty($_FILES["img"]['name'])){
            return false;
        }
        if (empty($_POST['des'])){
            return false;
        }
        return true;
    }

    function save_error_add(){
        global $error_arr;

        if (!is_numeric($_POST['stock'])){
            save_error_in_arr('stock_error', 'Vui lòng nhập số ');
        }

        if (!is_numeric($_POST['product_price'])){
            save_error_in_arr('price_error', 'Vui lòng nhập số ');
        }

        if ((int)$_POST['stock'] < 0){
            save_error_in_arr('stock_error', 'Vui lòng nhập số dương');
        }
        if ((int)$_POST['product_price'] < 0){
            save_error_in_arr('price_error', 'Vui lòng nhập số dương');
        }

        if (empty($_POST['catergory_id'])){
            save_error_in_arr('catergory_error', 'Vui lòng chọn danh mục');
        }

        if (empty($_FILES["img"]['name'])){
            save_error_in_arr('img_error', 'Vui lòng chọn ảnh');
        }

        if (empty($_POST['des'])){
            save_error_in_arr('des_error', 'Vui lòng điền mô tả');
        }
        $query_param = generate_query_param($error_arr);
        header ('location: ../index.php?page=product&action=add&' . $query_param);
    }

    function save_error(){
        global $error_arr;

        if (!is_numeric($_POST['stock'])){
            save_error_in_arr('stock_error', 'Vui lòng nhập số ');
        }

        if (!is_numeric($_POST['product_price'])){
            save_error_in_arr('price_error', 'Vui lòng nhập số ');
        }

        if ((int)$_POST['stock'] < 0){
            save_error_in_arr('stock_error', 'Vui lòng nhập số dương');
        }

        if ((int)$_POST['product_price'] < 0){
            save_error_in_arr('price_error', 'Vui lòng nhập số dương');
        }

        if (empty($_POST['catergory_id'])){
            save_error_in_arr('catergory_error', 'Vui lòng chọn danh mục');
        }

        if (empty($_POST['des'])){
            save_error_in_arr('des_error', 'Vui lòng điền mô tả');
        }
        
        $query_param = generate_query_param($error_arr);
        header ('location: ../index.php?page=product&action=edit&id='. $_POST['id'] . '&' . $query_param);
    }


    function generate_query_param($arr){
        $query_param = '';
        foreach ($arr as $n){
            $string = $n['error_name'] . '='. $n['error_value'] . '&';
            $query_param .= $string;
        }
        return $query_param;
    }

    function save_error_in_arr($error_name, $error_value){
        global $error_arr;
        $arr = [
            'error_name' =>  $error_name,
            'error_value' => $error_value
        ];
        array_push($error_arr , $arr);
    }

    function get_img_name(){
        if (!isset($_FILES['img']['name'])){
            return null;
        }
        $des = "../../view/img/shop/". $_FILES["img"]['name'];
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $des)){
            return $_FILES['img']['name'];
        }
    }              

    function get_product_img($product_id){
        global $conn;
        $sql = 'SELECT image_path FROM product WHERE id = ' . $product_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['image_path'];
    }

?>