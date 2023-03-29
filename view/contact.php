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
</head>

<body>
    <div class="app">
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
        

        <div class="our-store">
            <div class="grid">
                <h2 class="ourstore-title">OUR STORES</h2>
                <div class="box__wrapper">
                    
                </div>
                <div class="box__wrapper">
                    
                </div>
                <div class="box__wrapper">
                    
                </div>
            </div>
                
        </div>

        <div class="gird">
                <div class="news">
                    <img src="img/Rectangle 178.png" alt="">
                    <img src="img/Rectangle 181.png" alt="">
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
        </div>

        <footer class="footer">
            <div class="grid">
                <div class="article_YC">
                    <img src="img/Group 294.svg" alt="" class="img">
                    <br> <br>
                    <span class="">Lorem ipsum dolor sit amet, <br> consec tetur a elit. Inutark <br>ullamcorper leo, ege euismod <br>orci natoquepen etma.</span>
                    <a href="">
                        <i class="fa-brands fa-cc-visa"></i>
                    </a> 
                    <a href="">

                    <i class="fa-brands fa-cc-mastercard"></i>
                    </a>
                </div>
                <div class="article_YC">
                    <h3>QUICK LINKS</h3> <br>
                    <span>About us</span> <br> <br>
                    <span>What we do</span> <br> <br>
                    <span>Contact us</span> <br> <br>
                    <span>FAQ page</span> <br> <br>
                </div>
                <div class="article_YC">
                    <h3>FIND A STORE</h3> <br>
                    <span>Hemlock, Brooklyn, NY 11208</span> <br> <br>
                    <span>5 Bridge, Brooklyn, NY 11201</span> <br> <br>
                    <span>+101329621999</span> <br> <br>
                    <span>+1088472194</span>

                </div>
                <div class="article_YC">
                    <img src="img/Group 322.png" alt="">
                </div>
            </div>
        </footer>
    </div>
</body>

</html>