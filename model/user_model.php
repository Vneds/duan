<?php
    function get_user($id){
        global $conn;
        $sql = 'SELECT * FROM user WHERE id = ' . $_user_id;
        $catergory =  $conn->query($sql)->fetch();
        return $catergory['catergory_name']; 
    }

    
?>