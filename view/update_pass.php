<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $_SESSION['pass_error']='';
        global $conn;
        $id = $_POST['id'];
        $pass = $_POST['pass'];
        $pass_new = $_POST['pass_new'];
        $stmt = $conn->prepare("SELECT * FROM user WHERE id = ?" );
        $stmt->execute([$id]);
        $kq = $stmt->fetch();
        if(password_verify($pass,$kq['pass_word'])){ 
            if($pass_new != $pass){
                $sql = "UPDATE user SET pass_word=? WHERE id=?";
                $stmt_2 = $conn->prepare($sql);
                $new_pass = password_hash($pass_new, PASSWORD_BCRYPT);
                $stmt_2->execute([$new_pass,$_GET['id']]);
                header('location: ./index.php?page=user&id='.$_GET['id'].'');
                }
            else {
                $_SESSION['pass_error'] = 'Mật khẩu trùng nhau';
                die();
            }
        }
        else {
            $_SESSION['pass_error'] = 'Mật khẩu cũ đã sai';
            header('location: ./index.php?page=update_pass&id='.$_GET['id'].'');
            die();
        }
    }



  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/base.css">
    <link rel="stylesheet" href="view/css/user.css">
    <link rel="stylesheet" href="view/css/header.css">
    <link rel="stylesheet" href="view/css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Trang chủ</title>
</head>

<body>
    <div class="app">
        <?php include_once 'view/components/header.php'?>

        <?php
        $sql = 'SELECT * FROM user WHERE id = ' . $_GET['id'];
        $user_list = $conn->query($sql)->fetchAll(); 
        foreach($user_list as $user){
        ?> 
        ?>

        <div class="main">
            <div class="flex">  
            <img class="user_avatar" src="view/img/user/<?php echo $_SESSION['user']['img']?>" alt="">
            <form class="form" action="" method="POST" enctype="multipart/form-data">
                <input type="text" value="<?php echo $_GET['id'] ?>" hidden name="id">
                <div class="form-group">
                    <label for="userName">Mật khẩu cũ</label>
                    <input type="password" name='pass' class="form-control" id="user_name">
                    <?php 
                        if (isset($_SESSION['pass_error'])) : ?>
                            <div class="error"><?php echo $_SESSION['pass_error']?></div>
                    <?php endif?>
                </div>
                <div class="form-group">
                    <label for="email">Mật khẩu mới</label>
                    <input type="password"name='pass_new' class="form-control" id="email">
                </div>
                <button type='submit' class="btn btn-primary" name="update">Xác nhận</button>
            </form>
            <a href="./index.php?page=user_bill&id=<?php echo $user['id'] ?>"><button class="btn btn-primary" >lịch sử đơn hàng</button></a>
            <a href="././index.php?page=user&id=<?php echo $user['id'] ?>"><button class="btn btn-primary" >Quay lại</button></a>
            <a href="./model/log_out.php"><button class="btn btn-primary" >Đăng xuất</button></a>
            </div>
        </div>
        <?php }?>
        
        
    </div>
    <?php include_once 'view/components/footer.php'?>
</body>

</html>