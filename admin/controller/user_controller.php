<?php
    include_once '../model/connect_db.php';
    // GET hiển thị UI
    if (isset($_GET['action'])){
        switch($_GET['action']){
            case 'list':
                $user_list = get_user_list();
                include_once 'view/user/list.php';
                break;
            case 'add':
                include_once '../model/catergory_model.php';
                include_once 'view/product/add.php';
                break;
            case 'edit':
                $user = get_user_with_ID($_GET['id']);
                include_once 'view/user/edit.php';
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
                if(is_validate()){
                    $image_path = get_img_name();
                    $email = get_user_email($_POST['id']);
                    if ($email != $_POST['email']){
                        if (is_avaible_email()){
                            $email = $_POST['email'];
                        }
                    }
                    update_user($image_path, $email);
                    return;
                }
                save_error();
                break;
            case 'delete':
                delete_product($_POST['id']);
                break;
        }
    }

    function get_user_list(){
        global $conn;
        $sql = 'SELECT * FROM user';
        $user_list =  $conn->query($sql)->fetchAll();
        return $user_list; 
    }

    function get_user_with_ID($id){
        global $conn;
        $sql = 'SELECT * FROM user WHERE id = ' . $id;
        $user =  $conn->query($sql)->fetch();
        return $user; 
    }


    function update_user($image_path, $email){
        global $conn;
        $image_path = $image_path ?? get_user_img($_POST['id']);
        $email = $email ?? get_user_email($_POST['id']);
        $sql = 'UPDATE user SET user_name = ? , email = ?, role= ?, img = ? WHERE id = '. $_POST['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['user_name'], $email, $_POST['role'], $image_path ]);
        header ('location: ../index.php?page=user&action=list');
    }

    function is_avaible_email(){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM user WHERE email = ?');
        $stmt->execute([$_POST['email']]);
        if ($stmt->rowCount() == 0){
            return true;
        }
        return false;
    }

    function is_validate(){
        $email = get_user_email($_POST['id']);

        if ($email != $_POST['email']){
            if (!is_avaible_email()){
                return false;
            }
        }
        
        if ($_POST['role'] == ''){
            return false;
        }
        return true;
    }

    function save_error(){
        global $error_arr;
        $email = get_user_email($_POST['id']);

        if ($email != $_POST['email']){
            if (!is_avaible_email()){
                save_error_in_arr('email_error', 'Email đã tồn tại');
            }
        }
             
        if ($_POST['role'] == ''){
            save_error_in_arr('role_error', 'Vui lòng chọn vai trò');
        }

        $query_param = generate_query_param($error_arr);
        header ('location: ../index.php?page=user&action=edit&id='. $_POST['id'] . '&' . $query_param);
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
        $des = "../../view/img/user/". $_FILES["img"]['name'];
        if (move_uploaded_file($_FILES["img"]["tmp_name"], $des)){
            return $_FILES['img']['name'];
        }
    }    

    function get_user_img($user_id){
        global $conn;
        $sql = 'SELECT img FROM user WHERE id = ' . $user_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['img'];
    }

    function get_user_email($user_id){
        global $conn;
        $sql = 'SELECT email FROM user WHERE id = ' . $user_id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result['email'];
    }
?>