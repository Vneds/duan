<?php
    include_once '../model/connect_db.php';
    // GET hiển thị UI
    if (isset($_GET['action'])){
        switch($_GET['action']){
            case 'list':
                include_once '../model/product_model.php';
                include_once '../model/catergory_model.php';
                include_once 'view/bill/list.php';
                break;
            case 'detail':
                include_once '../model/product_model.php';
                include_once 'view/bill/detail.php';
                break;
          
        }
    }



    //POST thực hiện insert, update, detele
    if (isset($_POST['action'])){
        // include_once '../model/product_model.php';
        switch($_POST['action']){
            case 'update':
                update_bill();
                break;
        }
    }


    function change_status_background($status){
        if ($status == 'Đang xử lý') {
            return "badge bg-info";
        }
        if ($status == 'Hoàn tất') {
            return "badge bg-success";
        }
        if ($status == 'Đã hủy') {
            return "badge bg-danger";
        }
        if ($status == 'Đang giao hàng') {
            return "badge bg-warning";
        }
    }

    function get_bill_status($bill_id){
        global $conn;
        $sql = 'SELECT * FROM bill WHERE id = ' . $bill_id;
        $bill =  $conn->query($sql)->fetch();
        return $bill['status'];
    }

    function update_bill(){
        global $conn;
        $bill_status = get_bill_status($_POST['id']);
        if ($bill_status == 'Hoàn tất' || $bill_status == 'Đã hủy') {
            die();
        }
        $sql = 'UPDATE bill SET status = ? WHERE id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['status'], $_POST['id']]);
        header ('location: ../index.php?page=bill&action=list');
    }
?>