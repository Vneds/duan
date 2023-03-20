<?php
    include_once './connect_db.php';
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        $sql = "INSERT INTO product (product_name , product_price , catergory_id,image_path , des) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $des = "img/shop/". basename($_FILES["img"]['name']);
        $file = $_FILES["img"]["name"];
        move_uploaded_file($file, $des);
        $stmt ->execute([$_POST['product_name'],$_POST['product_price'],$_POST['catergory_id'], $_FILES["img"]['name'] , $_POST['des']]);
        header ('location: admin.php');
    }
?>
<head>
    <meta charset="UTF-8">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="author" content="Bin-It">
    <meta property="og:url" />
    <meta property="og:type" content="truongbinit" />
    <meta property="og:title" content="Website TruongBin" />
    <meta property="og:description" content="Wellcome to my Website" />

    <title>Nhân Viên | Quản Lý Bán Hàng</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
    <style>
        .flex {
            display: flex;
            padding: 0;
            gap: 20px;
        }

    </style>
    <script type="text/javascript">
        //Phân Trang Cho Table
        function Pager(tableName, itemsPerPage) {
            this.tableName = tableName;
            this.itemsPerPage = itemsPerPage;
            this.currentPage = 1;
            this.pages = 0;
            this.inited = false;

            this.showRecords = function (from, to) {
                var rows = document.getElementById(tableName).rows;
                for (var i = 1; i < rows.length; i++) {
                    if (i < from || i > to)
                        rows[i].style.display = 'none';
                    else
                        rows[i].style.display = '';
                }
            }

            this.showPage = function (pageNumber) {
                if (!this.inited) {
                    alert("not inited");
                    return;
                }
                var oldPageAnchor = document.getElementById('pg' + this.currentPage);
                oldPageAnchor.className = 'pg-normal';

                this.currentPage = pageNumber;
                var newPageAnchor = document.getElementById('pg' + this.currentPage);
                newPageAnchor.className = 'pg-selected';

                var from = (pageNumber - 1) * itemsPerPage + 1;
                var to = from + itemsPerPage - 1;
                this.showRecords(from, to);
            }

            this.prev = function () {
                if (this.currentPage > 1)
                    this.showPage(this.currentPage - 1);
            }

            this.next = function () {
                if (this.currentPage < this.pages) {
                    this.showPage(this.currentPage + 1);
                }
            }

            this.init = function () {
                var rows = document.getElementById(tableName).rows;
                var records = (rows.length - 1);
                this.pages = Math.ceil(records / itemsPerPage);
                this.inited = true;
            }

            this.showPageNav = function (pagerName, positionId) {
                if (!this.inited) {
                    alert("not inited");
                    return;
                }
                var element = document.getElementById(positionId);

                var pagerHtml = '<span onclick="' + pagerName +
                    '.prev();" class="pg-normal">&#171</span> | ';
                for (var page = 1; page <= this.pages; page++)
                    pagerHtml += '<span id="pg' + page + '" class="pg-normal" onclick="' + pagerName +
                        '.showPage(' + page + ');">' + page + '</span> | ';
                pagerHtml += '<span onclick="' + pagerName + '.next();" class="pg-normal">&#187;</span>';

                element.innerHTML = pagerHtml;
            }
        }
    </script>
</head>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <i class="fas fa-bars"></i>
            </button>
            <a class="navbar-brand" href="#"><i class="fa fa-user-circle" aria-hidden="true"></i> ADMIN</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php" data-toggle="tooltip" data-placement="bottom"
                        title="SẢN PHẨM">SẢN PHẨM</a></li>
                <li><a href="" data-toggle="tooltip" data-placement="bottom" title="DANH MỤC SẢN PHẨM">DANH MỤC SẢN PHẨM</a></li>
                <li><a href="./admin_bill.php" data-toggle="tooltip" data-placement="bottom" title="ĐƠN HÀNG">ĐƠN HÀNG</a></li>
                <li><a href="" data-toggle="tooltip" data-placement="bottom" title="BÀI VIẾT">BÀI VIẾT</a>
                </li>
                <li><a href="#contact" data-toggle="tooltip" data-placement="bottom" title="THỐNG KÊ">THỐNG KÊ</a>
                </li>
                <li>
                    <a href="#" data-toggle="tooltip" data-placement="bottom" title="TÀI KHOẢN"><b>Tài Khoản</b>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown">
                        <li><a href="/index.html" data-toggle="tooltip" data-placement="bottom"
                                title="ĐĂNG XUẤT"><b>Đăng xuất <i class="fas fa-sign-out-alt"></i></b></a></li>
                    </ul>
                </li>

            </ul>
        </div>
    </div>
</nav>
<div class="flex" style="margin: 80px;">
    <form class="form-group" action="" method="POST" enctype="multipart/form-data">
        <label for="">Tên sản phẩm</label>
        <input class="form-control" type="text" name="product_name">
        <label for="">Giá tiền</label>
        <input class="form-control" type="text" name="product_price">
        <label for="">Mô tả sản phẩm</label>
        <textarea class="form-control" name="des" rows="4" cols="50"></textarea>
        <label for="">Danh mục sản phẩm</label>
        <select class="form-control" name="catergory_id" id="">
            <?php 
                include_once './connect_db.php';
                $catergory_list = $conn->query('SELECT * FROM catergory ')->fetchAll();
                foreach ($catergory_list as $catergory){
            ?>
                    <option value="<?php echo $catergory['id']?>"><?php echo $catergory['catergory_name']?></option>
            <?php }?>
        </select>
        <label for="">Ảnh sản phẩm</label>
        <input class="form-control" type="file" name="img"> 
        <button class="btn btn-primary" type="submit">Thêm</button>
    </form>
</div>
<a href="./admin.php">
    <button class="btn btn-primary">Xem danh sách</button>
</a>
<div class="container-fluid end" style="background-color: black; height: 150px;">
        <div class="row text-center">
            <div class="col-lg-12 link">
                <i class="fab fa-facebook-f" style="color: white;"></i>
                <i class="fab fa-instagram" style="color: white;"></i>
                <i class="fab fa-youtube" style="color: white;"></i>
                <i class="fab fa-google" style="color: white;"></i>
            </div>
        </div>
    </div>
