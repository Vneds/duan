<?php
    include_once './connect_db.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
       $sql = 'UPDATE product SET product_name = ? , product_price = ? , des = ?  WHERE id = '. $_POST['id'];
       $stmt = $conn->prepare($sql);
       $stmt->execute([$_POST['product_name'], $_POST['product_price'],$_POST['des']]);
       header('Location: ./admin.php');
       die();
    }
    $stmt = $conn->prepare('SELECT * from product WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $product = $stmt->fetch();
    $image_path = "img/shop/" . $product['image_path'];
?>
<img src=<?php echo $image_path ?> alt="">
<form action="" method="POST">
    <input type="text" value=<?php echo $product['product_name']?> name="product_name">
    <input type="text" value=<?php echo $product['product_price']?> name="product_price">
    <input type="text" value=<?php echo $product['des']?> name="des">
    <input type="text" value=<?php echo $_GET['id']?> hidden name="id">
    <button type="submit">Sửa</button>
</form>
<a href="./admin.php">
    <button>Xem danh sách</button>
</a>