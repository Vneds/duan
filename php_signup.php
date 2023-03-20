<?php
            include "./connect_db.php";
            $sql = "INSERT INTO user (user_name, pass_word, email) VALUES (?,?,?)";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$_POST['user'],$_POST['pass'], $_POST['email']]);
            header('location: ./login.php');
        ?> 