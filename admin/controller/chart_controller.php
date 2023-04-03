<?php
    include_once '../model/connect_db.php';
    // GET hiển thị UI
    if (isset($_GET['action'])){
        switch($_GET['action']){
            case 'show':
                $revenue = $conn->query('SELECT total_money FROM bill')->fetchAll();
                include_once 'view/chart/chart.php';
                break;
            default:
                break;
        }
    }
?>