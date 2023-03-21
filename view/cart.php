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
    <link rel="stylesheet" href="view/css/cart.css">
    <title>Trang chủ</title>
</head>

<body>
    <div class="app">
        <?php include_once 'view/components/header.php'?>


        
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
                            <a href="index.php?page=cart_delete&index=<?php echo $i?>"><img src="view/img/vector 12.png" alt="" class="shuffle"></a>
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
<<<<<<< HEAD:cart.php
                            <a href="checkout.php"><button class="btn">Place Order</button></a>
=======
                            <a href="index.php?page=checkout"><button class="btn">Place Order</button></a>
>>>>>>> 055e2e2ca109c4e34487ce78e621e4e761e458ec:view/cart.php
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