<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (!is_avaible_email($conn)){
            header('location: ./index.php?page=signup&email_error=Email đã tồn tại');
            die();
        }
        insert_user($conn);
        header('location: ./index.php?page=login');
    }
    
    function insert_user($conn){
        $sql = "INSERT INTO user (user_name, pass_word, email) VALUES (?,?,?)";
        $stmt = $conn->prepare($sql);
        $pass = password_hash($_POST['pass'], PASSWORD_BCRYPT);
        $stmt->execute([$_POST['user'],$pass, $_POST['email']]);
    }

    function is_avaible_email($conn){
        $stmt = $conn->prepare('SELECT * FROM user WHERE email = ?');
        $stmt->execute([$_POST['email']]);
        echo $stmt->rowCount();
        if ($stmt->rowCount() == 0){
            return true;
        }
        return false;
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng nhập quản trị | Website quản trị</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="view/css/util.css">
    <link rel="stylesheet" type="text/css" href="view/css/main.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
</head>

<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="view/img/shop/team.jpg" alt="IMG">
                </div>
                <!--=====TIÊU ĐỀ======-->
                <form action="" class="login100-form validate-form" enctype="multipart/form-data" method="post">
                    <span class="login100-form-title">
                        <b>ĐĂNG KÝ</b>
                    </span>
                    <!--=====FORM INPUT TÀI KHOẢN VÀ PASSWORD======-->
                    <form enctype="multipart/form-data" method="post" action="">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" required placeholder="Tên đăng nhập" name="user">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-user'></i>
                            </span>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"  placeholder="Email" name="email" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-user'></i>
                            </span>
                            <?php 
                                if (isset($_GET['email_error'])) : ?>
                                    <div class="error"><?php echo $_GET['email_error']?></div>
                            <?php endif?>
                        </div>
                        <div class="wrap-input100 validate-input">
                            <input autocomplete="off" class="input100" type="password" required placeholder="Mật khẩu" name="pass">
                            <span toggle="#password-field" class="bx fa-fw bx-hide field-icon click-eye"></span>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-key'></i>
                            </span>
                        </div>

                        <div class="container-login100-form-btn">
                        <input type="submit" name="signup" value="Đăng ký">
                        </div>
                        <div class="text-right p-t-12">
                            <a class="txt2" href="./index.php?page=login">
                                Đăng nhập
                            </a>
                        </div>
                        
                    </form>
                    
                    
                </form>
            </div>
        </div>
    </div>


    <script src="/js/main.js"></script>
    <script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/select2/select2.min.js"></script>
    <!-- <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("myInput");
            if (x.type === "password") {
                x.type = "text"
            } else {
                x.type = "password";
            }
        }
        $(".click-eye").click(function () {
            $(this).toggleClass("bx-show bx-hide");
            var input = $($(this).attr("toggle"));
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    </script> -->
    <!-- action="< ?php echo $_SERVER['PHP_SELF'];?>" -->
</body>

</html>