<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $login_error = $phone_error = $district_error = $ward_error = '';

        if (validate_checkout()){
            insert_bill();
            insert_bill_detail();
            unset($_SESSION['cart']);
            header('Location: index.php?page=index');
        }
    }

    function is_login(){
        if (!empty($_SESSION['user'])){
            return true;
        }
        return false;
    }

    function validate_checkout(){
        global $phone_error;
        global $district_error;
        global $ward_error;
        global $login_error;
        $error = false;
        if (!is_login()){
            $login_error = "<script>alert('Vui lòng đăng nhập')</script>";
            $error = true;
        }
        if (strlen($_POST['phone']) < 10) {
            $phone_error = '<div class="error">Vui lòng nhập đúng số điện thoại</div>';
            $error = true;
        }
        if (empty($_POST['district'])){
            $district_error = '<div class="error">Vui lòng chọn quận</div>';
            $error = true;
        }
        if (empty($_POST['ward'])){
            $ward_error = '<div class="error">Vui lòng chọn phường</div>';
            $error = true;
        }

        if ($error){
            return false;
        }
        return true;
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
    <?php echo $login_error ?? ''?>
    <div class="app">
        <?php include_once 'view/components/header.php'?>;
        <div class="main">
        <div class="tittle_cart">
            <p>Thanh toán</p>
        </div> 
            <div class="container cart-page">
            <div class="cart_block form_check">
        <form class="form-control" action="index.php?page=checkout" method="POST" style="display: flex;">
            <div class="checkout_1">
            <div class="input_check">
                <label for="">Tên người mua</label><br>
                <input type="text" name="user_name" class="user-name" id="" required>
            </div>
            <div class="input_check">
                <label for="">Số điện thoại</label><br>
                <input type="text" name="phone" id="" class="email" required>
                <?php echo $phone_error ?? ''?>
            </div>
            <div class="input_check">
                <label for="">Tỉnh/Thành Phố</label><br>
                <select type="text" name="province" class="user-name province" id="">
                    <option value="">Chọn thành phố</option>
                </select>
            </div>
            <div class="input_check">
                <label for="">Phường/Xã</label><br>
                <select type="text" name="ward" class="user-name ward" id="">
                    <option value="">Chọn phường xã</option>
                </select>
                <?php echo $ward_error ?? ''?>
            </div>
            
        </div>
            
            <div class="checkout_2">
            <div class="input_check">
                <label for="">Email</label><br>
                <input type="text" name="email" id="" class="phone" required></td>
            </div>
            <div class="input_check">
                <label for="">Địa chỉ</label><br>
                <input type="text" name="street" id="" class="address" required></td>
            </div>
            <div class="input_check">
                <label for="">Quận huyện</label><br>
                <select type="text" name="district" class="user-name district" id="">
                    <option value="">Chọn quận huyện</option>
                </select>
                <?php echo $district_error ?? ''?>
            </div>
            <div class="input_check">
                <label for="">Ghi chú</label><br>
                <input type="text" name="text" id="" class="email"></td>
            </div>
        </div>
            <!-- <button type="submit">Thanh toans</button> -->
    </div>
                
                <div class="total__price">
                    <table>
                        <tr>
                            <td id="total_color">Order detail</td>
                        </tr>
                        <?php 
                            $total_money = 0;
                            $sum = 0;
                            $product_list = $_SESSION['cart'];
                            foreach($product_list as $product){
                                $total_money += $product['product_price'] * $product['quantity'];
                                $sum += $total_money;
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
                            $_SESSION['total_money'] = $sum;
                        ?>
                        <tr>
                            <td>Order total</td>
                            <td> <?php echo $sum?></td>
                        </tr>
                        <tr>
                            <td>Shipping</td>
                            <td>$0</td>
                        </tr>
                        <td><hr class="hr"></td>
                        <tr>
                            <td>Subtotal</td>
                            <td><?php echo $sum?></td>
                        </tr>
                        <tr>
                            <td>
                            <button type="suvmit" class="btn checkout"><p class="text_button">Đặt Hàng</p></button>
                            </td>
                        </tr>
                    </table>
                </div>
                        </form>

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
        let province = $('.province');
        let district = $('.district');
        let ward = $('.ward');

        console.log(district);
        
        $(document).ready(async function(){
            let provinceList = await showAllProvince();
            renderData(province, provinceList);
            
            province.change(async function(){
                let b = await getDistricts(getCode(province.val()));
                renderData(district, b.districts);
            })

            district.change(async function(){
                let b = await getWards(getCode(district.val()));
                renderData(ward, b.wards);
            })
        })

        function renderData(select, array){
            select.html('');
            let html = '';
            $.each(array, (index, item) => {
                html += `<option value="${item.code}|${item.name}">${item.name}</option>`;
            })
            select.append(html);
        }

        function getCode(text){
            let arr = text.split("|");
            return arr[0];
        }

        function showAllProvince(){
            return fetch('https://provinces.open-api.vn/api/p/').then(respone => respone.json());
        }

        function getDistricts(code){
            return fetch(`https://provinces.open-api.vn/api/p/${code}?depth=2`).then(respone => respone.json());
        }
     
        function getWards(code){
            return fetch(`https://provinces.open-api.vn/api/d/${code}?depth=2`).then(respone => respone.json());
        }

    </script>
</body>

</html>