<?php 

function get_post_list($limit = null){
    global $conn;
    if (!$limit){
        $post_list = $conn->query('SELECT * FROM post')->fetchAll();
        return $post_list;
    }
    $sql = 'SELECT * FROM post LIMIT ' . $limit;
    $post_list = $conn->query($sql)->fetchAll();
    return $post_list;
}

    function get_post_with_ID($post_id){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM post WHERE id = ? ');
        $stmt->execute([$post_id]);
        return $stmt->fetch();
    }
  
    function get_post_title($post_title){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM post WHERE id = ? ');
        $stmt->execute([$post_title]);
        return $stmt->fetch();
    }
   
    function get_post_content($post_content){
        global $conn;
        $stmt = $conn->prepare('SELECT * FROM post WHERE id = ? ');
        $stmt->execute([$post_content]);
        return $stmt->fetch();
    }
    function get_image_path($image_name){
        $image_path = "view/img/blog/" . $image_name;
        return $image_path;
    }



?>