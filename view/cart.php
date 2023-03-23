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
    <link rel="stylesheet" href="view/css/header.css">
    <link rel="stylesheet" href="view/css/footer.css">
    <title>Trang chủ</title>
</head>

<body>
    <div class="app">
        <?php include_once 'view/components/header.php'?>

        <div class="main">
        <div class="tittle_cart">
            <p>Giỏ Hàng</p>
        </div>           
            <div class="container cart-page">
                <table class="cart_block">
                    <tr>
                        <th class="name__product">Product</th>
                        <th>Price</th>
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
                            <img class="img_cart" src="<?php echo $product['image_path'] ?>">
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
                            <?php echo $product['product_price']?>
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
                        <td><hr class="hr"></td>
                        <tr>
                            <td>Subtotal</td>
                            <td>$<?php echo $total_money ?></td>
                        </tr>
                        <tr>
                            <td>
                                <a href="index.php?page=checkout"><button class="btn"><p class="text_button">Đặt Hàng</p></button></a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        
        
    </div>
    <?php include_once 'view/components/footer.php'?>;
</body>

</html>