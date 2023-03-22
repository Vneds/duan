<header class="header">
    <div class="grid">
        <div class="header__logo">
            <a href="./index.php?page=index"><img src="view/img/Group 294.svg" alt="" class="img"></a>
            <!-- <img src="img/Group 294.svg" alt="" class="img"> -->
        </div>
        <ul class="header__nav">
            <li class="header__nav-item"><a href="./index.php?page=index" class="header__nav-link">HOME<svg width="7" height="6"
                        viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.8225 0.619141L3.5 3.5624L6.1775 0.619141L7 1.52525L3.5 5.38105L0 1.52525L0.8225 0.619141Z"
                            fill="#303030"/>
                    </svg></a></li>
            <li class="header__nav-item"><a href="" class="header__nav-link">BLOG <svg width="7" height="6"
                        viewBox="0 0 7 6" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.8225 0.619141L3.5 3.5624L6.1775 0.619141L7 1.52525L3.5 5.38105L0 1.52525L0.8225 0.619141Z"
                            fill="#303030" />
                    </svg></a></li>
            <li class="header__nav-item"><a href="./index.php?page=shop" class="header__nav-link">SHOP</a></li>
            <li class="header__nav-item"><a href="" class="header__nav-link">ABOUT</a></li>
            <li class="header__nav-item"><a href="./index.php?page=contact" class="header__nav-link">CONTACT</a></li>
            <?php 
            if(isset($_SESSION['user_name'])){
                echo '<li style="color: #F598A4;text-transform:uppercase;font-weight: 600;font-size: 14px;" 
                class="header__nav-item ">'.'XIN CHÀO '.$_SESSION['user_name'].'</li>';
                // echo '<a href="./tranguser.php"><img class="imguser" src="../'.$_SESSION['img'].'"></a>';
            }
            else {
                echo '<li class="header__nav-item"><a href="login.php" class="header__nav-link">ADMIN</a></li>';
            }
            ?>

        </ul>
        <div class="header__action">
            <input type="text">
            <a href="" class="header__action-item"><img src="view/img/search_icon.svg" alt=""></a>
            <a href="" class="header__action-item"><img src="view/img/icon_user.svg" alt=""></a>
            <a href="" class="header__action-item"><img src="view/img/cart_icon.svg" alt=""></a>
            <a href="" class="header__action-item"><img src="view/img/hamburger menu.svg" alt=""></a>
        </div>
    </div>
</header>