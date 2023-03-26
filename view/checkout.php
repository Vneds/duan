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
    <link rel="stylesheet" href="view/css/header.css">
    <link rel="stylesheet" href="view/css/footer.css">
    <title>Trang chủ</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <div class="app">
        <?php include_once 'view/components/header.php'?>;
        <div class="main">
        <div class="tittle_cart">
            <p>Thanh toán</p>
        </div> 
            <div class="container cart-page">
            <div class="cart_block form_check">
        <form class="form-control" action="index.php?page=checkout" method="POST">
            <div class="checkout_1">
            <div class="input_check">
                <label for="">Tên người mua</label><br>
                <input type="text" name="user_name" class="user-name" id=""></td>
            </div>
            <div class="input_check">
                <label for="">Số điện thoại</label><br>
                <input type="text" name="phone" id="" class="email"></td>
            </div>
            <div class="input_check">
                <label for="">Tỉnh/Thành Phố</label><br>
                <input type="text" name="address" class="user-name" id=""></td>
            </div>
            <div class="input_check">
                <label for="">Phường/Xã</label><br>
                <input type="text" name="address" id="" class="email"></td>
            </div>
            <button type="submit">Thanh toán</button>
        </div>
            
            <div class="checkout_2">
            <div class="input_check">
                <label for="">Email</label><br>
                <input type="text" name="email" id="" class="phone"></td>
            </div>
            <div class="input_check">
                <label for="">Địa chỉ</label><br>
                <input type="text" name="address" id="" class="address"></td>
            </div>
            <div class="input_check">
                <label for="">Quận huyện</label><br>
                <input type="text" name="address" class="user-name" id="" ></td>
            </div>
            <div class="input_check">
                <label for="">Ghi chú</label><br>
                <input type="text" name="text" id="" class="email" ></td>
            </div>
        </div>
            <!-- <button type="submit">Thanh toans</button> -->
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
                                        <?php echo $product['quantity']?>
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
                        <td><hr class="hr"></td>
                        <tr>
                            <td>Subtotal</td>
                            <td><?php echo $total_money?></td>
                        </tr>
                        <tr>
                            <td>
                            <button class="btn checkout"><p class="text_button">Đặt Hàng</p></button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="tittle_cart_1">
            <p>Phương thức Thanh toán</p>
        </div>
    <div class="payment_method">
        <div class="payment_1">
            <input type="radio"><p class="payment_radio">Thanh toán khi nhận hàng</p> 
        </div>
        <div class="payment_2">
            <input type="radio"><p class="payment_radio">Thanh toán online bằng thẻ</p> 
            
        </div>
    </div>




    <?php include_once 'view/components/footer.php'?>;

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