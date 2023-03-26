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
    <link rel="stylesheet" href="view/css/shop.css">
    <link rel="stylesheet" href="view/css/header.css">
    <link rel="stylesheet" href="view/css/footer.css">
    <title>Shop</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>

<body>
    <div class="app">
        <?php include_once 'view/components/header.php'?>;
        <div class="container">
            <div class="grid">
                <div clas./detail.html="image__wrapper">
                    <img src="view/img/shop/Rectangle 2.svg" alt="" class="br">
                    <h2 class="image__title">SHOP</h2>
                    <span class="image__breadcrum">Home / Shop</span>
                </div>

                <div class="content spw">
                    <sidebar class="sidebar__filter-wrapper">
                        <div class="sidebar__filter">
                            <h2 class="sidebar__heading">Filter by price</h2>
                            <input type="range" class="sidebar__range-input">
                            <div class="spw">
                                <span class="sidebar__span">Price: $7 - $56</span>
                                <button class="btn">FILTER</button>
                            </div>
                        </div>

                        <ul class="sidebar__category">
                            <h2 class="sidebar__heading">Danh mục sản phẩm</h2>
                            <?php 
                                $catergory_list = get_catergory_list();
                                foreach($catergory_list as $catergory) {
                                    $quantity = get_product_quantity_in_each_catergory($catergory['id']);
                            ?>
                                <li class="sidebar__category-item">
                                    <div class="sidebar__category-link" onclick="filter(this)" value=<?php echo $catergory['id']?> >
                                        <?php echo $catergory['catergory_name'] ?>
                                        <?php echo '(' .$quantity[0]. ')'?>
                                    </div>
                                </li>
                            <?php ; }?>
                        </ul>

                        <ul class="sidebar__tags">
                            <h2 class="sidebar__heading">Tags</h2>
                            <li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Casual</a></li>
                            <li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Classic</a></li>
                            <li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Creative</a></li>
                            <li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Elegant</a></li>
                            <li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Gadgets</a></li>
                            <li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Lifestyle</a></li>
                            <li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Minimal</a></li>
                            <li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Minimalistic</a></li>
                            <li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Modern</a></li>
                            <li class="sidebar__tag-item"><a href="" class="sidebar__tag-link">Style</a></li>
                        </ul>
                    </sidebar>

                    <div class="products">
                        <div class="products__heading spw">
                            <div class="products__heading-left">
                                <a href="" class="products__heading-left-item"><img src="view/img/shop/Group.svg" alt="" class="products__heading-left-img"></a>
                                <a href="" class="products__heading-left-item"><img src="view/img/shop/🦆 icon _list_.svg" alt="" class="products__heading-left-img"></a>
                            </div>
                            <div class="products__heading-right">
                                <select name="" id="" class="products__heading-right-select">
                                    <option value="" class="products__heading-right-option">12</option>
                                </select>

                                <select name="" id="" class="products__heading-right-select">
                                    <option value="" class="products__heading-right-option">Default sorting</option>
                                </select>
                            </div>
                        </div>

                        <ul class="products__warpper">
                            <?php 
                                $product_list = get_product_list();
                                foreach($product_list as $product){
                                $image_path = get_image_path($product['image_path']);
                            ?>
                                <li class="products__item">
                                    <a href="index.php?page=detail&id=<?php echo $product['id'] ?>">
                                        <img src=<?php echo $image_path ?> alt="" class="products__item-img">
                                        <span class="products__item-name">
                                            <?php echo $product['product_name']?>    
                                        </span>
                                        <span class="products__item-price">
                                            <?php echo $product['product_price']?>
                                        </span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>

                        <ul class="products__pagenation">
                            <li class="products__pagenation-item"><a href="" class="products__pagination-link">1</a></li>
                            <li class="products__pagenation-item"><a href="" class="products__pagination-link">2</a></li>
                            <li class="products__pagenation-item"><a href="" class="products__pagination-link">3</a></li>
                            <li class="products__pagenation-item"><a href="" class="products__pagination-link">-></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <?php include_once 'view/components/footer.php'?>;

    <script>
        let wrapper = $('.products__warpper'); 
        function filter(e){
            $.ajax({
                url: './api/api.php',
                data: {action: 'filter_catergory', catergory_id: e.getAttribute('value')},
                dataType: 'JSON',
                type: 'GET',
                success: function(result){
                    let html = '';
                    result.forEach(product => {
                        let image_path = "view/img/shop/" + product['image_path'];
                        html += `
                                    <li class="products__item">
                                        <a href="index.php?page=detail&id= ${product['id']}">
                                            <img src=${image_path} class="products__item-img">
                                            <span class="products__item-name">
                                                ${product['product_name']}
                                            </span>
                                            <span class="products__item-price">
                                                ${product['product_price']}
                                            </span>
                                        </a>
                                    </li>
                                `;    
                    });
                    wrapper.html(html);
                    html = '';
                }
            })
        }
        $('.sidebar__category-link').click(()=> {
        })
    </script>

</body>

</html>