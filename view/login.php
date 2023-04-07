<?php
    session_start();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $kq = getuser($user,$pass);
        if (!$kq){
            header('location: ./index.php?page=login');
        }

        $_SESSION['user'] = [
            'role' => $kq['role'],
            'iduser' => $kq['id'],
            'user_name' => $kq['user_name'],
            'email' => $kq['email']
        ];

        if( $_SESSION['user']['role'] == 1){
            header('location: ./admin/index.php?page=index');
            die();
        }
        else if($_SESSION['user']['role'] == 0){
            // $_SESSION['role'] = $role;
            // $_SESSION['iduser'] = $kq['id'];
            // $_SESSION['user_name'] = $kq['user_name'];
            // $_SESSION['email'] = $kq['email'];
            // $_SESSION['img']=$kq[0]['img'];
        header('location: ./index.php?page=index');

        die();
        }
        else{
            header('location: ./index.php?page=index');
        }
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
                <form class="login100-form validate-form" action="" enctype="multipart/form-data" method="post">
                    <span class="login100-form-title">
                        <b>ĐĂNG NHẬP</b>
                    </span>
                    <!--=====FORM INPUT TÀI KHOẢN VÀ PASSWORD======-->
                    <form action="" enctype="multipart/form-data" method="post">
                        <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" required placeholder="Tên đăng nhập" name="user">
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-user'></i>
                            </span>
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
                            <input type="submit" name="login" value="Đăng nhập">
                        </div>
                        <div class="text-right p-t-12"> 
                            <a class="txt2" href="./index.php?page=signup">
                               Đăng ký
                            </a>
                            |
                            <a class="txt2" href="./index.php?page=forgot">
                                Bạn quên mật khẩu?
                            </a>
                        </div>
                        
                    </form>
                    <?php
            // if(isset($_POST["login"])&&($_POST["login"])){
            //     $user=$_POST['user'];
            //     $pass=$_POST['pass'];
                
            //     $servername = "localhost:3306";
            //     $username = "root";
            //     $password = "";

            //     try {
            //     $conn = new PDO("mysql:host=$servername;dbname=duan1", $username, $password);
            //     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //     $stmt = $conn->prepare("SELECT * FROM user WHERE user_name ='".$user."' AND pass_word ='".$pass."'" );
            //     $stmt->execute();
            //     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
            //     $kq=$stmt->fetchAll();
            //     if(count($kq)==0){
            //         echo "Sai thông tin đăng nhập";
            //     }else {
            //         $_SESSION["user_name"]=$user;
            //         $_SESSION["pass_word"]=$pass;

            //         header('location: admin.php');
            //     }            

            //     } catch(PDOException $e) {
            //     echo "Connection failed: " . $e->getMessage();
            //     }

            // }
        ?>
                    
                    
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