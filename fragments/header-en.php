<header>
    <div id="header-left">
        <div id="header-wrapper-left">
            <img src="../img/logo-new-white-left.png" alt="" class="header-logo" id="header-img-left">
            <div id="nav-left" class="navigation">
                <ul class="nav-list" id="nav-list-left">
                    <li class="nav-list-link"><a href="black-white">Products</a></li>
                    <li class="nav-list-link"><a href="index">Home</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div id="header-right">
        <div id="header-wrapper-right">
            <img src="../img/logo-new-black-right.png" alt="" class="header-logo" id="header-img-right">
            <div id="nav-right" class="navigation">
                <ul class="nav-list" id="nav-list-right">
                    <li class="nav-list-link"><a href="about">About</a></li>
                    <li class="nav-list-link"><a href="#modal1" class="my-cart-trigger" data-color="white" <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) echo 'style="color: red;"'; ?>>My Cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</header>
<?php
require_once ("cart-modal-en.php");
?>