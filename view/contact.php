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
    <link rel="stylesheet" href="view/css/contact.css">
    <link rel="stylesheet" href="view/css/header.css">
    <link rel="stylesheet" href="view/css/footer.css">

    <title>Liên hệ - Contact</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Trang chủ</title>

</head>

<body>
    
    <div class="contact">
    <?php include_once 'view/components/header.php'?>;
        <div class="container">
            <div class="slider">
                <div class="content">
                    <h1 class="slider__title">CONTACT US
                    </h1>
                </div>
            </div>
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3918.4435923680976!2d106.62563435050585!3d10.853826360689895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752bee0b0ef9e5%3A0x5b4da59e47aa97a8!2zQ8O0bmcgVmnDqm4gUGjhuqduIE3hu4FtIFF1YW5nIFRydW5n!5e0!3m2!1svi!2s!4v1679000632490!5m2!1svi!2s" width="1290" height="320" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div>
        </div>
        <div class="ourstore">
            <div class="grid">
            <div class="ourstore-title">
                    <H2>OUR STORE</H2>
            </div>
            </div>     
         </div>
            <div class="contact_add">
                <!-- item1 -->
                <div class="item">

                    <div style="padding-top: 48px; padding-left: 180px;" class="add_item">
                        <img src="view/img/Group 401.svg" width ="70px" height="70px"alt="">
                    </div>
                    <h3 class="add_heading">
                        ADDRESS
                </h3>

                <div style="padding:0px 180px 18px 180px;margin-top:-50px;" class="add_item">
                <img src="view/img/Line 16.png" width="70px" height="5px" alt="">
                </div>


                    <div class="add_subheading">
                        <p>No. 23, St. Louis Street, Melbo, USA and 78, Thanh Xuan, Hanoi</p>
                    </div>
                </div>
<!-- item2 -->
                <div class="item2">

<div style="padding-top: 48px; padding-left: 180px;" class="add_item">
    <img src="view/img/Group 400.svg" width ="70px" height="70px"alt="">
</div>
<h3 style="color:#f5f5f5;" class="add_heading">
    CONTACT US
</h3>

<div style="padding:0px 180px 18px 180px;margin-top:-50px;" class="add_item">
<img src="view/img/Line 16 (1).png" width="70px" height="5px" alt="">
</div>


<div style="color:#f5f5f5;" class="add_subheading">
    <p>No. 23, St. Louis Street, Melbo, USA and 78, Thanh Xuan, Hanoi</p>
</div>
</div>
<!-- item3 -->
<div class="item">

<div style="padding-top: 48px; padding-left: 180px;" class="add_item">
    <img src="view/img/Group 402.svg" width ="70px" height="70px"alt="">
</div>
<h3 class="add_heading">
    EMAIL
</h3>

<div style="padding:0px 180px 18px 180px;margin-top:-50px;" class="add_item">
<img src="view/img/Line 16.png" width="70px" height="5px" alt="">
</div>


<div class="add_subheading">
    <p>No. 23, St. Louis Street, Melbo, USA and 78, Thanh Xuan, Hanoi</p>
</div>
</div>


            </div>

                
   
            <div class="git">
            <div class="grid">
            <div class="git-title">
                    <H2>GET IN TOUCH</H2>
            </div>
         
            </div>     
         </div>
        
        <div class="in4">
            <div class="name">
                <input type="text" placeholder ="Your name">
            </div>
            <div class="name">
                <input type="text" placeholder="Your Email">
            </div>
            <div class="name">
                <input type="text" placeholder="Your Subject">
            </div>

            <div class="mess">
                <input type="text" placeholder="Your message">
            </div>
            <button>SEND MESSAGE</button>
        </div>
        

        <div class="grid">
                <div class="news">
                    <img src="view/img/Rectangle 178.png" alt="">
                    <img src="view/img/Rectangle 181.png" alt="">
                    <div class="news_email">
                         <div class="news_span">
                            <h2>NEWSLETTER</h2>
                            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</span>
                         </div>
                         <div class="news_button">
                            <input type="text" placeholder="ENTER YOUR MAIL" class="btn__mail">
                            <button>SUBCRIBE</button>
                         </div>
                    </div>
                </div>
            </div>
        <?php include_once 'view/components/footer.php'?>;

        
    </div>
</body>

</html>