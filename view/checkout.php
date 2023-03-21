<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        insert_bill();
        insert_bill_detail();
        header('Location: index.php?page=index');
    }
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <div class="app">
        <?php include_once 'view/components/header.php'?>;
        <div class="main">
            <div class="container cart-page">
                <div class="cart_block">
                    <h2>Thanh toán</h2>
                    <form class="form-control" action="index.php?page=checkout" method="POST">
                        <label for="">Tên người đặt</label>
                        <input type="text" name="user_name" class="user-name" id="" placeholder="Nhập tên người đặt"></td>
                        <label for="">Emai</label>
                        <input type="text" name="email" id="" class="email" placeholder="Nhập email"></td>
                        <label for="">Số điện thoại</label>
                        <input type="text" name="phone" id="" class="phone" placeholder="Nhập số điện thoại"></td>
                        <label for="">Địa chỉ</label>
                        <input type="text" name="address" id="" class="address" placeholder="Nhập địa chỉ"></td>
                        <button type="submit">Thanh toans</button>
                    </form>
                </div>
                
                <div class="total__price">
                    <table>
                        <tr>
                            <td id="total_color">Order detail</td>
                        </tr>
                        <?php 
                            $total_money = 0;
                            $product_list = $_SESSION['cart'];
                            foreach($product_list as $product){
                                $total_money += $product['product_price'] * $product['quantity'];
                        ?>
                        <tr>
                            <td>
                                <div class="cart__info">
                                    <img src=<?php echo $product['image_path']?>>
                                    <div>
                                        <br>
                                        <span>
                                        <?php echo $product['product_name']?>
                                        </span>
                                        <br>
                                        <br>
                                        <span>
                                            Price: <?php echo $product['product_price']?>
                                        </span>
                                        <br>
                                        <br>
                                        <a class="remove" href="">Remove</a>
                                    </div>
                            </div>
                        </td>
                        </tr>
                        <?php };
                            $_SESSION['total_money'] = $total_money;
                        ?>
                        <tr>
                            <td>Order total</td>
                            <td> <?php echo $total_money?></td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>$0</td>
                        </tr>
                        <hr>
                        <tr>
                            <td>Subtotal</td>
                            <td>$16</td>
                        </tr>
                        <tr>
                            <td>
                            <button class="btn checkout">Place Order</button>
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

        <script>
            // let userName = $('.user-name');
            // let phone = $('.phone');
            // let email = $('.email');
            // let address = $('.address');
            // $('.checkout').click(()=>{
            //     console.log(address.val());
            //     $.post('./add_bill.php', {user_name: userName.val(), phone: phone.val(), email: email.val(), address: address.val()}, ()=>{
            //         // window.location.href = 'index.php';
            //     })
            // })
        </script>
</body>

</html>