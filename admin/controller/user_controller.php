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
        switch($_POST['action']){
            case 'add':
                add_product();
                break;
            case 'edit':
                update_user();
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


    function update_user(){
        global $conn;
        $sql = 'UPDATE user SET user_name = ? , email = ?, role= ? WHERE id = '. $_POST['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['product_name'],$_POST['email'], $_POST['role'] ]);
        header ('location: ../index.php?page=user&action=list');
    }
?>