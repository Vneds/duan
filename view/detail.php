<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view/css/base.css">
    <link rel="stylesheet" href="view/css/header.css">
    <link rel="stylesheet" href="view/css/footer.css">
    <link rel="stylesheet" href="view/css/detail.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <title>Detail</title>
</head>

<body>
    <div class="app">
        <?php include_once 'view/components/header.php'?>;
        <div class="container">
            <div class="grid">
                <div class="image__wrapper">
                    <img src="view/img/shop/Rectangle 2.svg" alt="" class="br">
                    <h2 class="image__title">PRODUCT</h2>
                    <span class="image__breadcrum">Home / Dinner ware / Product</span>
                </div>


                <?php 
                    $product = get_product_with_ID($_GET['id']);
                    $image_path = get_image_path($product['image_path']);
                    $product = get_product_with_ID($_GET['id']);
                    $image_path = get_image_path($product['image_path']);
                ?>

                <div class="spw">
                    <div class="gallery">
                        <div class="gallery__item--huge">
                            <img src=<?php echo $image_path ?> alt="">
                        </div>
                        <div class="spw" style="margin: 0 -7px;">
                            <div class="gallery__item">
                                <img src="<?php echo $image_path ?>" alt="">
                            </div>
                            <div class="gallery__item">
                                <img src="<?php echo $image_path ?>" alt="">
                            </div>
                            <div class="gallery__item">
                                <img src="<?php echo $image_path ?>" alt="">
                            </div>
                            <div class="gallery__item">
                                <img src="<?php echo $image_path ?>" alt="">
                            </div>
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

                        <div class="spw infor__qty-wrapper">
                            <span class="infor__qty">SL</span>

                            <div class="infor__quantity spw">
                                <a class="infor__quantity-item decrease">-</a>
                                <a class="infor__quantity-item value">1</a>
                                <a class="infor__quantity-item increase">+</a>
                            </div>

                           <button class="btn add-to-cart" id=<?php echo $product['id']?>>Thêm vào giỏ</button>
                        </div>

                        <hr>

                        <div class="infor__action">
                            <span class="infor__action-item"><img src="img/detail/🦆 icon _heart_.svg" alt="">Yêu thích</span>
                            <span class="infor__action-item">So sánh</span>
                        </div>

                        <hr>

                        <div class="infor__share">
                            <img src="view/img/detail/Vector.svg" class="infor__share-item"></img>|
                            <img src="view/img/detail/Vector-1.svg" class="infor__share-item"></img>|
                            <img src="view/img/detail/Vector-2.svg" class="infor__share-item"></img>|
                            <img src="view/img/detail/Vector-3.svg" class="infor__share-item"></img>|
                            <img src="view/img/detail/Vector-4.svg" class="infor__share-item"></img>|
                        </div>

                        <hr>

                        <div class="classify">
                            <div class="classify__item"><b>CATEGORY:</b> Explore Dinnerware</div>

                            <div class="classify__item"><b>TAGS:</b> Explore Dinnerware</div>
                        </div>
                    </div>
                </div>

                <div class="description">
                    <a href="" class="description__nav">DESCRIPTION</a>
                    <a href="" class="description__nav">REVIEW (0)</a>
                    <hr>
                    <div class="spw">
                        <div class="description__column">
                            <h3 class="description__heading">Care Intructions</h3>
                            <p class="description__paragraph">Microwave and dishwasher safe. We recommend using gentle, environmentally-friendly detergents. Not suitable for use on an open flame or electric stove top. Avoid temperature shock by heating things slowly, evenly, and carefully</p>
                        </div>

                        <div class="description__column">
                            <h3 class="description__heading">PRODUCT SPECS</h3>
                            <p class="description__paragraph">Material: Ceramic<br>
                                Size: 4″ dia.<br>
                                Capacity: 16 oz<br>
                                Designed and handcrafted in Sausalito, CA.</p>
                        </div>

                        <div class="description__column">
                            <h3 class="description__heading">DID YOU KNOW?</h3>
                            <p class="description__paragraph">Microwave and dishwasher safe. We recommend using gentle, environmentally-friendly detergents. Not suitable for use on an open flame or electric stove top. Avoid temperature shock by heating things slowly, evenly, and carefully</p>
                        </div>
                    </div>
                </div>

                <div class="sale">
                    <div class="spw">
                        <div class="sale__title">ĐANG GIẢM GIÁ</div>
                        <a href="" class="sale__all">Xem tất cả</a>
                    </div>

                    <ul class="sale__menu spw">
                        <?php 
                            $product_list = get_product_list(4);
                            foreach($product_list as $product){
                                $image_path = get_image_path($product['image_path']);
                        ?>
                                <li class="sale__menu-item">
                                    <a href="" class="sale__menu-link">
                                        <img src=<?php echo $image_path ?> alt="" class="sale__img">
                                        <span class="sale__name"><?php echo $product['product_name']?></span>
                                        <span class="sale__price"><b><?php echo $product['product_price']?></b></span>
                                    </a>
                                </li>
                        <?php }?>
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
            window.location.href = 'index.php?page=cart_add&id=' + productID + '&quantity=' + Number(value.text());
        })
    </script>

    <?php include_once 'view/components/footer.php'?>;
</body>

</html>