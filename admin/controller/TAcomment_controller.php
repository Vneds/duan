<?php
    include_once '../model/connect_db.php';
    // GET hiển thị UI
    if (isset($_GET['action'])){
        switch($_GET['action']){
            case 'list':
                include_once '../model/post_model.php';
                include_once '../model/user_model.php';
                include_once '../model/TAcomment_model.php';
                include_once 'view/TA_cmt/list.php';
                break;
            case 'add':
                include_once '../model/post_model.php';
                include_once '../model/user_model.php';
                include_once '../model/TAcomment_model.php';
                include_once 'view/TA_cmt/add.php';
                break;
            case 'edit':
                include_once '../model/post_model.php';
                include_once '../model/user_model.php';
                include_once '../model/TAcomment_model.php';
                include_once 'view/TA_cmt/edit.php';
                break;
          
        }
    }



    //POST thực hiện insert, update, detele
    if (isset($_POST['action'])){
        // include_once '../model/comment_model.php';
        switch($_POST['action']){
            case 'add':
                add_comment();
                break;
            case 'edit':
                update_comment();
                break;
            case 'delete':
                delete_comment($_POST['id']);
                break;
        }
    }

    function add_comment(){
        global $conn;
        $sql = "INSERT INTO comment (id ,content, user_id,post_id,sub_comment_id ) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt ->execute([$_POST['id'], $_POST['content'], $_POST['user_id'], $_POST['post_id'], $_POST['sub_comment_id']]);
            header ('location: ../index.php?page=TA_cmt&action=list');
        } 

    function update_comment(){
        global $conn;
        $sql = 'UPDATE comment SET content = ? , user_id = ?, post_id = ? , sub_comment_id = ?  WHERE id = '. $_POST['id'];
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['content'],$_POST['user_id'], $_POST['post_price'], $_POST['subcomment_id']]);
        header ('location: ../index.php?page=TA_cmt&action=list');
    }

    function delete_comment($id){
        global $conn;
        $stmt = $conn->prepare('DELETE FROM comment WHERE id = ?');
        $stmt->execute([$id]);
        header ('location: ../index.php?page=TA_cmt&action=list');
    }
?>