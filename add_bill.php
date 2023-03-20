<?php 
    session_start();
    include_once './connect_db.php';
    $sql = 'INSERT INTO bill(maDH, user_name, address, phone, user_id, total_money) VALUES (?,?,?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $maDH = generate_random_string();
    $stmt->execute([$maDH, $_POST['user_name'], $_POST['address'], $_POST['phone'] , 1, $_SESSION['total_money']]);
    
    
    $sql_2 = 'INSERT INTO bill_detail(bill_id , product_id, quantity ) VALUES (?,?,?)';
    $stmt_2 = $conn->prepare($sql_2);
    $bill_id = get_current_ID($conn);

    
    foreach($_SESSION['cart'] as $product){
        $stmt_2->execute([$bill_id, $product['product_id'], $product['quantity']]);
    }
    session_destroy();
    header('Location: ./index.php');
    function get_current_ID($conn){
        $id = $conn->query('SELECT id from bill order by id desc')->fetch();
        return $id['id'];
    }

    function generate_random_string(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
     
        for ($i = 0; $i < 5; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
     
        return $randomString;
    }
?>