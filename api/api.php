<?php 
    session_start();
    include_once '../model/connect_db.php';
    if (isset($_GET['action'])){
        $action = $_GET['action'];
    }
    if (isset($_POST['action'])){
        $action = $_POST['action'];
    }

    switch($action){
        case 'filter_catergory':
            filter_catergory($conn, $_GET['catergory_id']);
            break;
        case 'filter_bill_status':
            filter_bill_status($conn, $_GET['status']);
            break;
        case 'search':
            search($conn, $_GET['key_word']);
            break;
        case 'show_comment':
            show_comment($conn , $_GET['productID']);
            break;
        case 'send_comment':
            send_comment($conn);
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
        echo $sql;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        echo json_encode($stmt->fetchAll());
    }

    function show_comment($conn, $product_id){
        $sql = 'SELECT * FROM comment_product WHERE product_id = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$product_id]);
        echo json_encode($stmt->fetchAll());
    }

    function send_comment($conn){
        $sql = 'INSERT INTO comment_product(content , user_id , product_id ) VALUES (?,?,?) ';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_POST['content'], $_SESSION['user']['iduser'], $_POST['product_id']]);

        show_comment($conn , $_POST['product_id']);
    }
?>