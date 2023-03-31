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
    <link rel="stylesheet" href="view/css/blog.css">
    <link rel="stylesheet" href="view/css/header.css">
    <link rel="stylesheet" href="view/css/footer.css">
    <title>Bài viết-Blog</title>
</head>

<body>
    <div class="app">

        <?php include_once 'view/components/header.php' ?>
        <div class="container">
            <div class="slider">
                <div class="content">
                    <h1 class="slider__title">Blogs
                    </h1>
                </div>
            </div>
        </div>
            </div>


            <div class="grid">
                <div class="article" style="background-image: url('view/img/Group\ 399.svg');">
                
                    <span class="article__author">By: admin</span>
                    <h2 class="article__heading">THE KEY IS VICTORY WAS<br>CREATING ROUTINES</h2>
                    <span class="article__subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</span>
                    <button class="btn">Đọc thêm</button>
                </div>
            </div>


            <div class="grid">
                <div class="article2" style="background-image: url('view/img/Group\ 393(2).svg');">
                
                    <span class="article2__author">By: admin</span>
                    <h2 class="article2__heading">MODERN HOUSE REMODEL IS ALL<br>ABOUT DETAILS</h2>
                    <span class="article2__subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</span>
                    <button class="btn2">Đọc thêm</button>
                </div>
            </div>


            <div class="grid">
                <div class="article" style="background-image: url('view/img/Group\ 394.svg');">
                
                    <span class="article__author">By: admin</span>
                    <h2 class="article__heading">DESIGNING A MANAGER OFFICE</h2>
                    <span class="article__subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</span>
                    <button class="btn">Đọc thêm</button>
                </div>
            </div>


            <div class="grid">
                <div class="article2" style="background-image: url('view/img/Group\ 395.svg');">
                
                    <span class="article2__author">By: admin</span>
                    <h2 class="article2__heading">FURNITURE DESIGN BASICS</h2>
                    <span class="article2__subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</span>
                    <button class="btn2">Đọc thêm</button>
                </div>
            </div>


            <div class="grid" >
                <div class="article" style="background-image: url('view/img/Group\ 396.svg');">
                
                    <span class="article__author">By: admin</span>
                    <h2 class="article__heading">EXPAND YOUR MIND,CHANGE<br>EVERYTHING</h2>
                    <span class="article__subheading">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</span>
                    <button class="btn">Đọc thêm</button>
                </div>
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
</html>