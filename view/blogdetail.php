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
    <link rel="stylesheet" href="view/css/blogdetail.css">
    <link rel="stylesheet" href="view/css/header.css">
    <link rel="stylesheet" href="view/css/footer.css">
    <title>Blog</title>
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
            <?php 
                    $post = get_post_with_ID($_GET['id']);
                    $image_path = get_image_path($post['image_path']);
                ?>
   <div class="detail">
    <div class="detail_img">
     <img src=<?php echo $image_path ?> alt="" >
    </div>
    
    <div class="title">
        <h2> <?php echo $post['title']?> </h2>
    </div>
    <div class="detail_content">
        <p>Lorem ipsum dolor sit amet, consectetur a elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus musbulum ultricies aliquam. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim. morbi accumsan ipsum velit nam.</p></br>
        <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt auctor a ornare odio. Sed non mauris vitae erat consequat auctor eu in elit. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet.</p></br>
        <p>Duo inermis repudiandae an, harum mandamus qui in. No quo mazim doming facilisi, duo ea impetus suavitate interpretaris. No dictas scripta placerat per, ut graeco perfecto reprehendunt mea. Pri an reque postea scriptorem, audiam conclusionemque per eu. An enim oblique has, graecis deserunt has no. Soleat laoreet posidonium an vel, delenit pertinax appellantur an est.</p></br>
        <p>Lorem ipsum dolor sit amet, consectetur a elit. In ut ullamcorper leo, eget euismod orci. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus musbulum ultricies aliquam. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Duis sed odio sit amet nibh vulputate. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Mauris in erat justo. Nullam ac urna eu felis dapibus condimentum sit amet a augue. Sed non neque elit. Sed ut imperdiet nisi. Proin condimentum fermentum nunc. Etiam pharetra, erat sed fermentum feugiat, velit mauris egestas quam, ut aliquam massa nisl quis neque. Suspendisse in orci enim. morbi accumsan ipsum velit nam.</p></br>    
    </div>
    <div class="related">
        <div class="related_content">
            <span>RELATED POST</span>
        </div>
        <div class="related_post">
            <div class="post">
                <div class="post_img">
                    <img  src="view/img/image 11.svg" alt="">
                </div>
                <span  style="font-weight: 700;">MODERN HOUSE REMODEL IS ALL ABOUT DETAILS</span>
                <p style="font-weight: 400;">By admin</p>
            </div>
            <div class="post">
                <div class="post_img">
                    <img  src="view/img/image 12.svg" alt="">
                </div>
                <span  style="font-weight: 700;">DESIGNING A MANAGER OFFICE</span>
                <p style="font-weight: 400;">By admin</p>
            </div>
            <div class="post">
                <div class="post_img">
                    <img  src="view/img/image 13.svg" alt="">
                </div>
                <span  style="font-weight: 700;">FURNITURE DESIGN BASICS</span>
                <p style="font-weight: 400;">By admin</p>
            </div>
        </div>
    </div> 
    <div class="post_comment">
        <div class="comment">
            <span>YOUR COMMENT</span>
        </div>
        <input type="text" placeholder="Your Comment">
        <button>SEND</button>
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
            <?php
            $detail_blog = get_post_content($_GET['id']);
            ?>
            <h1 class="infor__title">
                            <?php echo $detail_blog['title']?>
                        </h1>
    <?php include_once 'view/components/footer.php'?>;
    
</body>

</html>
</html>
        