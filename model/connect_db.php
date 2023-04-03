
<?php

    $host= 'localhost';
    $dbName = 'duan1';
    $userName = 'root';
    $password = '123456';

    try {
        // Kết nối
        $conn = new PDO("mysql:host=$host;dbname=$dbName", $userName, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } 
    catch (PDOException $e) {
        echo "Kết nối thất bại: " . $e->getMessage();
    }
    return $conn;

    function getuser($user,$pass){
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM user WHERE user_name = ? AND pass_word =  ? " );
        $stmt->execute([$user, $pass]);
        $kq = $stmt->fetch();
        return $kq;
      }
?>
