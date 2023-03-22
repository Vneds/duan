<?php 
    include_once 'model/connect_db.php';
    function get_catergory_list(){
        global $conn;
        $catergory_list = $conn->query('SELECT * FROM catergory')->fetchAll();
        return $catergory_list;
    }

    function get_product_quantity_in_each_catergory($catergory_id){
        global $conn;
        $sql = 'select count(*) as quantity from product WHERE catergory_id =  ' . $catergory_id . ' GROUP BY catergory_id' ;
        $quantity = $conn->query($sql)->fetch();
        return $quantity;
    } 

    function get_catergory_name($catergory_id){
        global $conn;
        $sql = 'SELECT * FROM catergory WHERE id = ' . $catergory_id;
        $catergory =  $conn->query($sql)->fetch();
        return $catergory['catergory_name']; 
    }
?>