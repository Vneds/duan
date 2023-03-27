<?php
    include_once '../model/connect_db.php';
    // GET hiển thị UI
    if (isset($_GET['action'])){
        switch($_GET['action']){
            case 'list':
                include_once '../model/catergory_model.php';
                include_once 'view/catergory/list.php';
                break;
            case 'add':
                include_once '../model/catergory_model.php';
                include_once 'view/catergory/add.php';
                break;
            case 'edit':
                include_once '../model/catergory_model.php';
                $catergory = get_catergory_with_ID($_GET['id']);
                include_once 'view/catergory/edit.php';
                break;
          
        }
    }



    //POST thực hiện insert, update, detele
    if (isset($_POST['action'])){
        // include_once '../model/product_model.php';
        switch($_POST['action']){
            case 'add':
                add_catergory();
                break;
            case 'edit':
                update_catergory();
                break;
            case 'delete':
                delete_catergory($_POST['id']);
                break;
        }
    }

    function add_catergory(){
        global $conn;
        $sql = "INSERT INTO catergory (catergory_name) VALUES (?)";
        $stmt = $conn->prepare($sql);
        $stmt ->execute([$_POST['catergory_name']]);
        
        header ('location: ../index.php?page=catergory&action=list');
        } 

    function update_catergory(){
        global $conn;
        $sql = 'UPDATE catergory SET catergory_name = ? WHERE id = '. $_POST['id'];
        $stmt = $conn->prepare($sql);
        $stmt ->execute([$_POST['catergory_name']]);
        header ('location: ../index.php?page=catergory&action=list');
    }

    function delete_catergory($id){
        global $conn;
        $stmt = $conn->prepare('DELETE FROM catergory WHERE id = ?');
        $stmt->execute([$id]);
        header ('location: ../index.php?page=catergory&action=list');
    }
?>