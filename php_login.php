<?php 
    session_start();
    include './connect_db.php';
    if((isset($_POST['login'])) && ($_POST['login'])){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $kq = getuser($user,$pass);
        $role = $kq[0]['role'];
        $id = $kq[0]['id'];
        if($role == 1){
            $_SESSION['role'] = $role;
            header('location: ./admin.php');
        }else if ($id > 0){
            $_SESSION['role'] = $role;
            $_SESSION['iduser'] = $kq[0]['id'];
            $_SESSION['user_name'] = $kq[0]['user'];
            $_SESSION['email'] = $kq[0]['email'];
            // $_SESSION['img']=$kq[0]['img'];
            header('location: ./index.php');
        }
        else {
            header('location: ./login.php');
        }
    }
?>