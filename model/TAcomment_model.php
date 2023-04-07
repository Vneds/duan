<?php 

function get_cmt_list($limit = null){
    global $conn;
    if (!$limit){
        $cmt_list = $conn->query('SELECT * FROM comment')->fetchAll();
        return $cmt_list;
    }
    $sql = 'SELECT * FROM comment LIMIT ' . $limit;
    $cmt_list = $conn->query($sql)->fetchAll();
    return $cmt_list;
}

    function get_cmt_with_ID($cmt_id){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM comment WHERE id = ? ');
        $stmt->execute([$cmt_id]);
        return $stmt->fetch();
    }
    function get_cmt_title($cmt_id){
        global $conn;
        $sql = 'SELECT * FROM comment WHERE id = ' . $cmt_id;
        $cmt =  $conn->query($sql)->fetch();
        return $cmt['post_title']; 
    }

    




?>