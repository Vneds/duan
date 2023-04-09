<?php 
    session_start();
    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\SMTP;
    // use PHPMailer\PHPMailer\Exception;   

    // try {
    //     $mail = new PHPMailer(true);
    //     $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    //     $mail->isSMTP();
    //     $mail->Host = 'smtp.gmail.com';
    //     $mail->SMTPAuth = true;

    //     // người gửi
    //     $mail->Username = 'yengiaYG@gmail.com';
    //     $mail->Password = 'frmzypgjlsydaxwy'; 
    //     $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //     $mail->Port = 587; 
        
    //     // người nhận
    //     $mail->setFrom('yengiaYG@gmail.com', 'YG');
    //     $mail->addAddress('vietlqps25766@fpt.edu.vn'); 

    //     $mail->isHTML(true);  
    //     $mail->Subject =  'ákdaksd';
    //     $mail->Body = 'ádasdasd';

    //     $mail->send();
    //     echo 'Gửi mail thành công';
    // } catch (Exception $e) {
    //     echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    // }

    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function


    //Load Composer's autoloader
   

    //Create an instance; passing `true` enables exceptions
    // function send($title,$content,$name,$email){
    //     $mail = new PHPMailer(true);

    //     try {
    //         //Server settings
    //         $mail->SMTPDebug = 1;                      //Enable verbose debug output
    //         $mail->isSMTP();                                            //Send using SMTP
    //         $mail->Host       = 'smtp.example.com';                     //Set the SMTP server to send through
    //         $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    //         $mail->Username   = 'yengiaYG@gmail.com';                     //SMTP username
    //         $mail->Password   = 'frmzypgjlsydaxwy';                               //SMTP password
    //         $mail->SMTPSecure = 'ssl';           //Enable implicit TLS encryption
    //         $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //         //Recipients
    //         $mail->setFrom('yengiaYG@gmail.com', 'YG');
    //         $mail->addAddress($email,$name);     //Add a recipient

    //         // //Attachments
    //         // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
    //         // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

    //         //Content
    //         $mail->isHTML(true);                                  //Set email format to HTML
    //         $mail->Subject = 'Here is the subject: '.$title.'';
    //         $mail->Body    = $content;

    //         $mail->send();
    //         return true; 
    //     } catch (Exception $e) {
    //         echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //     }

    // }


  
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
      $mail->SetFrom("yengiaYG@gmail.com");
      $mail->Subject = "Test";
      $mail->Body = "hello";
      $mail->AddAddress("vietlqps25766@fpt.edu.vn");
  
       if(!$mail->Send()) {
          echo "Mailer Error: " . $mail->ErrorInfo;
       } else {
          echo "Message has been sent";
       }
  
?>