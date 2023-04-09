<?php 
session_start();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(isset($_POST['email'])&& filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors']='';
            $_SESSION['success']='';
            $email = $_POST['email'];
            $stmt = $conn->prepare('SELECT * FROM user WHERE email = ?');
            $stmt->execute([$email]);
            $kq = $stmt->fetch();
            if (empty($kq['email'])){
                $_SESSION['errors'] = 'Vui lòng đúng nhập email';
                header('location: ./index.php?page=forgot');
                die();
            }
            $rand_pass = generate_random_string();
            $title = 'Mật khẩu Mới';
            $content = "<h3>Gửi ".$kq['user_name'].'</h3>';
            $content .= "<p> chúng tôi đã nhận được yêu cầu cấp lại mật khẩu của bạn.</p>";
            $content .= "<p> chúng tôi đã cập nhật và gửi cho bạn mật khẩu mới </p>";
            $content .= "<p> mật khẩu mới của bạn là :</p> <b>$rand_pass</b>";
            $sendMai = send($title,$content, $kq['user_name'], $kq['email']);
            $hash = password_hash($rand_pass,PASSWORD_BCRYPT);
            $sql = "UPDATE user SET pass_word=? WHERE id=?";
            $stmt_2 = $conn->prepare($sql);
            $stmt_2->execute([$hash,$kq['id']]);
            $_SESSION['success']='Đã gửi đến email';
            header('location: ./index.php?page=forgot');
            die();
        }
    }

    function generate_random_string(){
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
     
        for ($i = 0; $i < 5; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
     
        return $randomString;
    }
    
    function send($title,$content,$name,$email){
        require("PHPMailer-master/src/PHPMailer.php");
        require("PHPMailer-master/src/SMTP.php");
        require("PHPMailer-master/src/Exception.php");
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP(); // enable SMTP
    
        $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
        $mail->SMTPAuth = true; // authentication enabled
        $mail->SMTPSecure = 'ssl'; // secure transfer enabled REQUIRED for Gmail
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 465; // or 587
        $mail->IsHTML(true);
        $mail->Username = "yengiaYG@gmail.com";
        $mail->Password = "frmzypgjlsydaxwy";
        $mail->SetFrom("yengiaYG@gmail.com","YG");
        $mail->Subject = "=?utf-8?b?".base64_encode($title)."?=";
        $mail->Body = "$content";
        $mail->AddAddress($email);
    
         if(!$mail->Send()) {
            echo "Mailer Error: " . $mail->ErrorInfo;
         } else {
            echo "Message has been sent";
         }
        }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Khôi phục mật khẩu | Website quản trị v2.0</title>
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
                    <img src="view/img/fg-img.png">
              </div>
                <form class="login100-form validate-form" enctype="multipart/form-data" method="post">
                    <span class="login100-form-title">
                        <b>KHÔI PHỤC MẬT KHẨU</b>
                    </span>
                    <form action="" enctype="multipart/form-data" method="post">
                        <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" placeholder="Nhập email" name="email" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class='bx bx-mail-send' ></i>
                            </span>
                        </div>
                        <?php
                        if (isset($_SESSION['errors'])){
                            echo $_SESSION['errors'];
                        }
                        if(isset($_SESSION['success'])){
                            echo $_SESSION['success'];
                        }
                        ?>
                        <div class="container-login100-form-btn">
                            <input type="submit" name="login" value="Lấy mật khẩu" style="background: var(--main_bg); border: var(--px_1) solid var(--main_bg); color: var(--black_color);">
                        </div>

                        <div class="text-center p-t-12">
                            <a class="txt2" href="./index.php?page=login">
                                Trở về đăng nhập
                            </a>
                        </div>
                    </form>
                    
                </form>
            </div>
        </div>
    </div>
   <!--===============================================================================================-->
   <script src="/js/main.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/bootstrap/js/popper.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
   <!--===============================================================================================-->
   <script src="vendor/select2/select2.min.js"></script>
   <!--===============================================================================================-->
   
</body>
</html>