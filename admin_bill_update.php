<?php 
    include './connect_db.php';
    $bill_status = get_bill_status($_POST['id']);
    if ($bill_status == 'Hoàn tất' || $bill_status == 'Đã hủy') {
        die();
    }
    
    $sql = 'UPDATE bill SET status = ? WHERE id = ?';
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_POST['status'], $_POST['id']]);

    function get_bill_status($bill_id){
        global $conn;
        $sql = 'SELECT * FROM bill WHERE id = ' . $bill_id;
        $bill =  $conn->query($sql)->fetch();
        return $bill['status'];
    }