<?php 

function get_comment_list($limit = null){
    global $conn;
    if (!$limit){
        $comment_list = $conn->query('SELECT * FROM comment')->fetchAll();
        return $comment_list;
    }
    $sql = 'SELECT * FROM comment LIMIT ' . $limit;
    $comment_list = $conn->query($sql)->fetchAll();
    return $comment_list;
}

    function get_comment_with_ID($comment_id){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM comment WHERE id = ? ');
        $stmt->execute([$comment_id]);
        return $stmt->fetch();
    }
    function get_comment_content($comment_content){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM post WHERE id = ? ');
        $stmt->execute([$comment_content]);
        return $stmt->fetch();
    }


?>