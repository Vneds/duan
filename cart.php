<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/cart.css">
    <title>Trang chủ</title>
</head>

<body>
    <div class="app">
        <header class="header">
            <div class="grid">
                <div class="header__logo">
                    <img src="img/Group 294.svg" alt="" class="img">
                </div>
                <ul class="header__nav">
                    <li class="header__nav-item"><a href="" class="header__nav-link">HOME<svg width="7" height="6"
                                viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.8225 0.619141L3.5 3.5624L6.1775 0.619141L7 1.52525L3.5 5.38105L0 1.52525L0.8225 0.619141Z"
                                    fill="#303030" />
                            </svg></a></li>
                    <li class="header__nav-item"><a href="forgot.php" class="header__nav-link">BLOG <svg width="7" height="6"
                                viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M0.8225 0.619141L3.5 3.5624L6.1775 0.619141L7 1.52525L3.5 5.38105L0 1.52525L0.8225 0.619141Z"
                                    fill="#303030" />
                            </svg></a></li>
                    <li class="header__nav-item"><a href="shop.php" class="header__nav-link">SHOP</a></li>
                    <li class="header__nav-item"><a href="" class="header__nav-link">ABOUT</a></li>
                    <li class="header__nav-item"><a href="contact.php" class="header__nav-link">CONTACT</a></li>
                    <li class="header__nav-item"><a href="login.php" class="header__nav-link">ADMIN</a></li>

                </ul>
                <div class="header__action">
                    <a href="" class="header__action-item"><img src="img/search_icon.svg" alt=""></a>
                    <a href="" class="header__action-item"><img src="img/icon_user.svg" alt=""></a>
                    <a href="" class="header__action-item"><img src="img/cart_icon.svg" alt=""></a>
                    <a href="" class="header__action-item"><img src="img/hamburger menu.svg" alt=""></a>
                </div>
            </div>
        </header>


        
        <div class="main">
            <div class="container cart-page">
                <table class="cart_block">
                    <tr>
                        <th class="name__product">Product</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                    
                    <tr>
                        <?php
                            $i = 0;
                            $total_money = 0;
                            foreach($_SESSION["cart"] as $product){
                            $product_price = (int)$product['product_price']; 
                            $total_money += $product_price ;
                                    
                        ?>
                        <td>
                            <div class="cart__info">
                            <img src="<?php echo $product['image_path'] ?>">
                                <div>
                                    <br>
                                    <span>
                                    <?php echo $product['product_name']?>
                                    </span>
                                    <br>
                                    <br>
                                    <span>
                                    <?php echo $product['product_price']?>
                                    </span>
                                    <br>
                                    <br>
                                    <a class="remove" href="">Remove</a>
                                </div>
                            </div>
                        </td>
    
                        <td>
                            <div class="container__quantity">
                                    <a class="container__quantity-item">-</a>
                                    <a class="container__quantity-item"> <?php echo $product['quantity']?></a>
                                    <a class="container__quantity-item">+</a>
                            </div>
                        </td>
                        <td>
                            <?php echo $product['product_price']?>
                        </td>
                        <td>
                            <a href="delete_cart.php?index=<?php echo $i?>"><img src="img/vector 12.png" alt="" class="shuffle"></a>
                        </td>
                    </tr>

                <?php 
                    $i++;
                }
                ?>
                </table>
                
                <div class="total__price">
                    <table>
                        <tr>
                            <td id="total_color">Order detail</td>
                        </tr>
                        <tr>
                            <td>Order total</td>
                            <td>$<?php echo $total_money ?></td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>$0</td>
                        </tr>
                        <hr>
                        <tr>
                            <td>Subtotal</td>
                            <td>$<?php echo $total_money ?></td>
                        </tr>
                        <tr>
                            <td>
                            <a href="checkout.php"><button class="btn">Place Order</button></a>
                            </td>
                        </tr>
                    </table>
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
</body>

</html>