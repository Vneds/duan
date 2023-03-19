<?php 
    include './connect_db.php';
?>
<!DOCTYPE html>
<html lang="en">

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

<body onload="time()" style="overflow-x: hidden;">
<?php
        if(isset($_POST['addProduct'])&&($_POST['addProduct'])){
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

            // Check if image file is a actual image or fake image
            if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            }

            // Check if file already exists
            if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
            }

            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
            }
            $id=$_POST['id'];
            $name=$_POST["name"];
            $image=$target_file;
            $price=$_POST["price"];
            //echo "đường dẫn : $img";
            ///////
            $sql = "INSERT INTO dienthoai (id,name,image,price) VALUES ('$id','$name','$image','$price')";
            $conn->exec($sql);  
            header("location:admin");
        }
    ?>
    <script>
        swal("Xin Chào Admin", "Chúc Bạn 1 Ngày Tốt Lành Nhé", "");
    </script>
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
    <div class="container-fluid al">
        <div id="clock"></div>
        <Br>
        <p class="timkiemnhanvien"><b>TÌM KIẾM SẢN PHẨM:</b></p><Br><Br>
        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Nhập tên sản phẩm cần tìm...">
        <i class="fa fa-search" aria-hidden="true"></i>

        <form action="">

        </form>
        <b>CHỨC NĂNG CHÍNH:</b><Br>
        <a href=""><button class="nv btn add-new" type="button" data-toggle="tooltip" data-placement="top"
            title="Thêm Sản Phẩm" onclick=""><i class="fas fa-plus"></i></button></a>
        <button class="nv" type="button" onclick="sortTable()" data-toggle="tooltip" data-placement="top"
            title="Lọc Dữ Liệu"><i class="fa fa-filter" aria-hidden="true"></i></button>
        <button class="nv xuat" data-toggle="tooltip" data-placement="top" title="Xuất File"><i
                class="fas fa-file-import"></i></button>
        <button class="nv cog" data-toggle="tooltip" data-placement="bottom" title=""><i
                class="fas fa-cogs"></i></button>
        <div class="table-title">
            <div class="row">

            </div>

        </div>
        <?php 
            function get_catergory_name($catergory_id){
                global $conn;
                $sql = 'SELECT * FROM catergory WHERE id = ' . $catergory_id;
                $catergory =  $conn->query($sql)->fetch();
                return $catergory['catergory_name']; 
            }

            function get_product($product_id){
                global $conn;
                $sql = 'SELECT * FROM product WHERE id = ' . $product_id;
                $product =  $conn->query($sql)->fetch();
                return $product;
            }

            function get_bill_status($bill_id){
                global $conn;
                $sql = 'SELECT * FROM bill WHERE id = ' . $bill_id;
                $bill =  $conn->query($sql)->fetch();
                return $bill['status'];
            }

            include './connect_db.php';
            $sql = 'SELECT * FROM bill_detail WHERE bill_id = ' . $_GET['id'];
            $bill_detail_list = $conn->query($sql)->fetchAll();  
            $bill_status = get_bill_status($_GET['id']);
        ?>
        
        <div class="flex">
            <p>Tình trạng đơn hàng: </p> 
            <?php 
                $disabled = '';
                if ($bill_status == 'Hoàn tất' || $bill_status == 'Đã hủy') {
                    $disabled = 'disabled';
                }
            ?>
            <select name="" class="select" id=<?php echo $_GET['id']?> <?php echo $disabled?>>
                <option value=<?php echo $bill_status?>><?php echo $bill_status?></option>
                <?php 
                    $status_list = ['Đang xử lý', 'Hoàn tất', 'Đã hủy'];
                    for ($i = 0 ; $i < count($status_list) ; $i++) {
                        if ($bill_status == $status_list[$i]) {
                            continue;
                        }
                ?>
                    <option value="<?php echo $status_list[$i]?>"><?php echo $status_list[$i]?></option>
                <?php }?>
            </select>
        </div>
        <button class="btn btn-primary update-bill" <?php echo $disabled?>>Cập nhật đơn hàng</button>

        <table class="table table-bordered" id="myTable">
            <thead>
                <tr class="ex">
                    <th>Hình Ảnh</th>
                    <th width="15%">Tên Sản Phẩm</th>
                    <th width="15%">Danh mục sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng mua</th>
                    <th>Tổng tiền</th>
                    <!-- <th width="15%">Phân Loại</th> -->
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($bill_detail_list as $bill_detail){
                        $product = get_product($bill_detail['product_id']);
                        $catergory_name = get_catergory_name($product['catergory_id']);
                        $image_path = "img/shop/" . $product['image_path'];
                        $total_money = $product['product_price'] * $bill_detail['quantity'];
                ?>
                        <tr>
                            <td style="text-align:center"><img width="100px" height="100px" src=<?php echo $image_path?> alt=""></td>
                            <td><?php echo $product['product_name'] ?></td>
                            <td><?php echo $catergory_name?></td>
                            <td><?php echo $product['product_price'] ?></td>
                            <td><?php echo $bill_detail['quantity'] ?></td>
                            <td><?php echo $total_money?></td>
                        </tr>
               <?php }?>
            </tbody>
        </table>
        <div id="pageNavPosition" class="text-right"></div>
        <script type="text/javascript">
            var pager = new Pager('myTable', 5);
            pager.init();
            pager.showPageNav('pager', 'pageNavPosition');
            pager.showPage(1);
        </script>
    </div>
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
    <script src="jquery.min.js"></script>
    <script type="text/javascript">
        function myFunction() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");
            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    txtValue = td.textContent || td.innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";  }}}}
        function sortTable() {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("myTable");
            switching = true;
            while (switching) {
                switching = false;
                rows = table.rows;
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("TD")[0];
                    y = rows[i + 1].getElementsByTagName("TD")[0];
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch = true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                    swal("Thành Công!", "Bạn Đã Lọc Thành Công", "success");
                }
            }
        }
        function time() {
            var today = new Date();
            var weekday = new Array(7);
            weekday[0] = "Chủ Nhật";
            weekday[1] = "Thứ Hai";
            weekday[2] = "Thứ Ba";
            weekday[3] = "Thứ Tư";
            weekday[4] = "Thứ Năm";
            weekday[5] = "Thứ Sáu";
            weekday[6] = "Thứ Bảy";
            var day = weekday[today.getDay()];
            var dd = today.getDate();
            var mm = today.getMonth() + 1;
            var yyyy = today.getFullYear();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            nowTime = h + ":" + m + ":" + s;
            if (dd < 10) {
                dd = '0' + dd
            }
            if (mm < 10) {
                mm = '0' + mm
            }
            today = day + ', ' + dd + '/' + mm + '/' + yyyy;
            tmp = '<i class="fa fa-clock-o" aria-hidden="true"></i> <span class="date">' + today + ' | ' + nowTime +
                '</span>';
            document.getElementById("clock").innerHTML = tmp;
            clocktime = setTimeout("time()", "1000", "Javascript");

            function checkTime(i) {
                if (i < 10) {
                    i = "0" + i;
                }
                return i;
            }
        }

        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            var actions = $("table td:last-child").html();
            $(".add-new").click(function () {
                $(this).attr("disabled", "disabled");
                var index = $("table tbody tr:last-child").index();
                var row = 
                    fr
                    '<tr>' +
                    '<td><input type="text" class="form-control" name="" id="" placeholder="Nhập ID"></td>' +
                    '<td><input type="text" class="form-control" name="" id="" placeholder="Nhập Tên Sản Phẩm"></td>' +
                    '<td><input type="file"  name="" id="" value=""></td>' +
                    '<td><input type="text" class="form-control" name="" id="" value="" placeholder="Nhập Giá"></td>' +
                    '<td><input type="text" class="form-control" name="" id="" value="" placeholder="Đánh Giá Sản Phẩm"></td>' +
                    '<td><input type="text" class="form-control" name="" id="" value="" placeholder="Loại Sản Phẩm"></td>' +
                    
                    '</tr>';
                
            });
            $(document).on("click", ".add", function () {
                var empty = false;
                var input = $(this).parents("tr").find('input[type="text"]');
                input.each(function () {
                    if (!$(this).val()) {
                        $(this).addClass("error");
                        swal("Thông Báo!", "Dữ Liệu Trống Vui Lòng Kiểm Tra", "error");
                        empty = true;
                    } else {
                        $(this).removeClass("error");
                        swal("Thông Báo!", "Bạn Chưa Nhập Dữ Liệu", "warning");
                    }
                });
                $(this).parents("tr").find(".error").first().focus();
                if (!empty) {
                    input.each(function () {
                        $(this).parent("td").html($(this).val());
                        swal("Thành Công", "Bạn Đã Cập Nhật Thành Công", "success");
                    });
                    $(this).parents("tr").find(".add, .edit").toggle();
                    $(".add-new").removeAttr("disabled");
                }
            });
            $(document).on("click", ".edit", function () {
                $(this).parents("tr").find("td:not(:last-child)").each(function () {
                    $(this).html('<input type="text" class="form-control" value="' + $(this)
                        .text() + '">');
                });
                $(this).parents("tr").find(".add, .edit").toggle();
                $(".add-new").attr("disabled", "disabled");
            });
            jQuery(function () {
                jQuery(".add").click(function () {
                    swal("Thành Công!", "Bạn Đã Sửa Thành Công", "success");
                });
            });
            // Xóa
            $(document).on("click", ".delete", function () {
                $(this).parents("tr").remove();
                swal("Thành Công!", "Bạn Đã Xóa Thành Công", "success");
                $(".add-new").removeAttr("disabled");
            });
        });
        //Not use
        jQuery(function () {
            jQuery(".cog").click(function () {
                swal("Sorry!", "Tính Năng Này Chưa Có", "error");
            });
        });
        //Tool tip
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

    <script>

        $('.update-bill').click(()=>{
            $.post('./admin_bill_update.php', {id: $('.select').attr('id') , status:$('.select').val() });
            window.location.href = './admin_bill.php';
        });
    </script>

</body>

</html>