<?php 
    include_once './connect_db.php';
    $stmt = $conn->prepare('DELETE FROM product WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    header('Location: ./admin.php');
?>