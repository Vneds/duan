<?php 
    function get_number_comment($product_id){
        global $conn;
        $sql = 'SELECT count(*) as quantity FROM comment_product WHERE product_id = ? GROUP BY product_id';
        $stmt =  $conn->prepare($sql);
        $stmt->execute([$product_id]);
        $quantity = $stmt->fetch();
        if (!$quantity){
            return 0;
        } 
        return $quantity['quantity'];
    }
?>