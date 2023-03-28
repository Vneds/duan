<?php 
    session_start();

    function insert_bill(){
        global $conn;
        $sql = 'INSERT INTO bill(maDH, user_name, address, phone, user_id, total_money) VALUES (?,?,?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $maDH = generate_random_string();
        $address = get_address();
        $stmt->execute([$maDH, $_POST['user_name'], $address, $_POST['phone'] , $_SESSION['user']['iduser'], $_SESSION['total_money']]);
    }

    function insert_bill_detail(){
        global $conn;
        $sql = 'INSERT INTO bill_detail(bill_id , product_id, quantity ) VALUES (?,?,?)';
        $stmt = $conn->prepare($sql);
        $bill_id = get_current_bill_ID($conn);

        foreach($_SESSION['cart'] as $product){
            $stmt->execute([$bill_id, $product['product_id'], $product['quantity']]);
        }
    }

    function get_current_bill_ID(){
        global $conn;
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

    function get_bill_status($bill_id){
        global $conn;
        $sql = 'SELECT * FROM bill WHERE id = ' . $bill_id;
        $bill =  $conn->query($sql)->fetch();
        return $bill['status'];
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

    function get_address(){
        $arr = [];
        array_push($arr, 
            get_name_of_address($_POST['ward']), 
            get_name_of_address($_POST['district']), 
            get_name_of_address($_POST['province'])
        );
        $addresDetail = implode(', ', $arr);
        return $_POST['street'] . ', ' . $addresDetail;
    }

    function get_name_of_address($text){
        $arr = explode('|', $text);
        return $arr[1];
    }
?>