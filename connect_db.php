<<<<<<< HEAD
<?php 
    $host = 'localhost:3306';
=======

<?php

    $host = 'localhost';
>>>>>>> 388020e0aa19604bcb94b78a7a26ae8a68e1e07b
    $dbName = 'duan1';
    $userName = 'root';
    $password = '123';

    try {
        // Kết nối
        $conn = new PDO("mysql:host=$host;dbname=$dbName", $userName, $password);
        
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
    return $conn;

?>
