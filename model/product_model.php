<?php 
    
    function get_product_list($limit = null){
        global $conn;
        if (!$limit){
            $product_list = $conn->query('SELECT * FROM product WHERE kho_hang >= 1')->fetchAll();
            return $product_list;
        }
        $sql = 'SELECT * FROM product WHERE kho_hang >= 1 LIMIT ' . $limit;
        $product_list = $conn->query($sql)->fetchAll();
        return $product_list;
    }

    function get_product_with_ID($product_id){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM product WHERE id = ? ');
        $stmt->execute([$product_id]);
        return $stmt->fetch();
    }
    
    function get_image_path($image_name){
        $image_path = "view/img/shop/" . $image_name;
        return $image_path;
    }

?>