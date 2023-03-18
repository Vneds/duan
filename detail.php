<?php 
    session_start();
    include_once './connect_db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/detail.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Detail</title>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <div class="header__logo">
                    <img src="img/Group 294.svg" alt="" class="img">
                </div>
                <ul class="header__nav">
                    <li class="header__nav-item"><a href="index.php" class="header__nav-link">HOME <svg width="7" height="6"
                                viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.8225 0.619141L3.5 3.5624L6.1775 0.619141L7 1.52525L3.5 5.38105L0 1.52525L0.8225 0.619141Z"
                                    fill="#303030" />
                            </svg></a></li>
                    <li class="header__nav-item"><a href="" class="header__nav-link">BLOG <svg width="7" height="6"
                                viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.8225 0.619141L3.5 3.5624L6.1775 0.619141L7 1.52525L3.5 5.38105L0 1.52525L0.8225 0.619141Z"
                                    fill="#303030" />
                            </svg></a></li>
                    <li class="header__nav-item"><a href="shop.php" class="header__nav-link">SHOP</a></li>
                    <li class="header__nav-item"><a href="detail.html" class="header__nav-link">ABOUT</a></li>
                    <li class="header__nav-item"><a href="contact.php" class="header__nav-link">CONTACT</a></li>
                </ul>
                <div class="header__action">
                    <a href="" class="header__action-item"><img src="img/search_icon.svg" alt=""></a>
                    <a href="" class="header__action-item"><img src="img/icon_user.svg" alt=""></a>
                    <a href="" class="header__action-item"><img src="img/cart_icon.svg" alt=""></a>
                    <a href="" class="header__action-item"><img src="img/hamburger menu.svg" alt=""></a>
                </div>
            </div>
        </header>

        <div class="container">
            <div class="grid">
                <div class="image__wrapper">
                    <img src="img/shop/Rectangle 2.svg" alt="" class="br">
                    <h2 class="image__title">PRODUCT</h2>
                    <span class="image__breadcrum">Home / Dinner ware / Product</span>
                </div>

                <?php 
                    $sql = 'SELECT * FROM product WHERE id = ' . $_GET['id'];
                    $product = $conn->query($sql)->fetch();
                    $image_path = 'img/shop/' . $product['image_path'];
                ?>

                <div class="spw">
                    <div class="gallery">
                        <img src=<?php echo $image_path?> class="gallery__item gallery__item--huge"></img>
                        <div class="spw">
                            <div class="gallery__item"></div>
                            <div class="gallery__item"></div>
                            <div class="gallery__item"></div>
                            <div class="gallery__item"></div>
                        </div>
                    </div>

                    <div class="infor">
                        <h1 class="infor__title">
                            <?php echo $product['product_name']?>
                        </h1>
                        <span class="infor__price"><b><?php echo $product['product_price']?>đ</b></span>
                        <p class="infor__paragraph"><?php echo $product['des']?></p>
                        <div class="spw">
                            <span class="infor__status">
                                Availability: <b>IN STOCK</b>
                            </span>

                            <span class="infor__id"> SKU: NO-6700-54</span>
                        </div>

                        <hr>

                        <div class="spw">
                            <span class="infor__qty">QTY</span>

                            <div class="infor__quantity">
                                <a class="infor__quantity-item decrease">-</a>
                                <a class="infor__quantity-item value">1</a>
                                <a class="infor__quantity-item increase">+</a>
                            </div>

                            <button class="btn add-to-cart" id=<?php echo $_GET['id']?> >Add to cart</button>
                        </div>

                        <hr>

                        <div class="infor__action">
                            <span class="infor__action-item">Add to wishlist</span>
                            <span class="infor__action-item">Compare</span>
                        </div>

                        <hr>

                        <div class="infor__share">
                            <span class="infor__share-item"></span>
                            <span class="infor__share-item"></span>
                            <span class="infor__share-item"></span>
                            <span class="infor__share-item"></span>
                            <span class="infor__share-item"></span>
                        </div>

                        <hr>

                        <div class="classify">
                            <span class="classify__item"><b>CATEGORY:</b> Explore Dinnerware</span>

                            <span class="classify__item"><b>TAGS:</b> Explore Dinnerware</span>
                        </div>
                    </div>
                </div>

                <div class="sale">
                    <div class="spw">
                        <div class="sale__title">Đang giảm giá</div>
                        <a class="sale__all">Xem tất cả</a>
                    </div>

                    <ul class="sale__menu spw">
                        <?php 
                            $product_list = $conn->query('SELECT * FROM product LIMIT 4')->fetchAll();
                            foreach($product_list as $product) {
                            $image_path_2 = 'img/shop/' . $product['image_path'];
                        ?>
                            <li class="sale__menu">
                                <a href="./detail.php?id=<?php echo $product['id']?>" class="sale__menu-item">
                                    <img src=<?php echo $image_path_2?> alt="" class="sale__img">
                                    <span class="sale__name"><?php echo $product['product_name']?></span>
                                    <span class="sale__price"><b><?php echo $product['product_price']?>đ</b></span>
                                </a>
                            </li>
                        <?php  } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    
    <script>
        const increseBtn = $('.increase');
        const decreseBtn = $('.decrease');
        const value = $('.value');

        increseBtn.click(()=> {
            let number = Number(value.text()) + 1;
            value.html(number)
        })

        decreseBtn.click(()=> {
            let number = Number(value.text()) - 1;
            if (isBelowOne()){
                value.html(1)
                return;
            }
            value.html(number);
        })

        function isBelowOne(){
            if (Number(value.text()) <= 1) {
                return true;
            }
            return false;
        }

        const addToCartBtn = $('.add-to-cart');

        addToCartBtn.click(()=> {
            let productID = addToCartBtn.attr('id');
            window.location.href = './addToCart.php?id=' + productID + '&quantity=' + Number(value.text());
        })


    </script>

</body>

</html>