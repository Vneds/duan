<?php 
    session_start();
    include './connect_db2.php';
    if((isset($_POST['login'])) && ($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $kq = getuser($user,$pass);
        print_r($kq);
        $role = $kq['role'];

        if (!$kq){
            header('location: ./login.php');
        }

        if($role == 1){
            $_SESSION['role'] = $role;
            header('location: ./admin.php');
        }else  {
            $_SESSION['role'] = $role;
            $_SESSION['iduser'] = $kq['id'];
            $_SESSION['user_name'] = $kq['user_name'];
            $_SESSION['email'] = $kq['email'];
            // $_SESSION['img']=$kq[0]['img'];
            header('location: ./index.php');
        }
    }
?>