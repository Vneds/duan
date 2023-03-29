<?php
session_start();
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
            <img class="user_avatar" src="view/img/user/<?php echo $user['img']?>" alt="">
            <form class="form" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="userName">Tên người dùng</label>
                    <input type="text" name='name' class="form-control" id="user_name" value="<?php echo $user['user_name'] ?>">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text"name='email' class="form-control" id="email" value="<?php echo $user['email'] ?>" >
                </div>
                <div class="form-group">
                    <label for="file">Ảnh đại diện</label>
                    <input type="file" name='img' class="form-control" id="file">
                </div>
                <button type='submit' class="btn btn-primary" name="update">Cập nhật</button>
            </form>
            <a href="./index.php?page=user_bill&id=<?php echo $user['id'] ?>"><button class="btn btn-primary" >lịch sử đơn hàng</button></a>
            <a href=""><button class="btn btn-primary" >Đổi mật khẩu</button></a>
            <a href="./model/log_out.php"><button class="btn btn-primary" >Đăng xuất</button></a>
            </div>
        </div>
        <?php }?>
        
        
    </div>
    <?php include_once 'view/components/footer.php'?>
</body>

</html>