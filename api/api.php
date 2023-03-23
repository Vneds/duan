<?php 
    include_once '../model/connect_db.php';
    $action = $_GET['action'];
    switch($action){
        case 'filter_catergory':
            filter_catergory($conn, $_GET['catergory_id']);
            break;
        case 'filter_bill_status':
            filter_bill_status($conn, $_GET['status']);
        case 'search':
            search($conn, $_GET['key_word']);
        default:
            break;
    }
    
    function filter_catergory($conn, $catergory_id){
        $sql = 'SELECT * FROM product WHERE catergory_id = ' . $catergory_id;
        $product_list = $conn->query($sql)->fetchAll();
        echo json_encode($product_list);
    }

    function filter_bill_status($conn, $status){
        if ($status == 'all') {
            $sql = 'SELECT * FROM bill';
            echo json_encode( $conn->query($sql)->fetchAll());
            return;
        }
        $sql = 'SELECT * FROM bill WHERE status = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$status]);
        echo json_encode($stmt->fetchAll());
    }

    function search($conn, $key_word){
        $sql = 'SELECT * FROM product WHERE product_name like %' . $key_word . '%';
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();   
    }
?>