<header>
    <div id="header-left">
        <div id="header-wrapper-left">
            <img src="../img/logo-new-white-left.png" alt="" class="header-logo" id="header-img-left">
            <nav id="nav-left">
                <ul class="nav-list" id="nav-list-left">
                    <li class="nav-list-link"><a href="shop.php">Proizvodi</a></li>
                    <li class="nav-list-link"><a href="index.php">Naslovnica</a></li>
                </ul>
            </nav>
        </div>
    </div>
    <div id="header-right">
        <div id="header-wrapper-right">
            <img src="../img/logo-new-black-right.png" alt="" class="header-logo" id="header-img-right">
            <nav id="nav-right">
                <ul class="nav-list" id="nav-list-right">
                    <li class="nav-list-link"><a href="about.php">O nama</a></li>
                    <li class="nav-list-link"><a href="cart.php">Moja košarica (<?php echo (isset($_SESSION['cart'])? count($_SESSION['cart']): '0'); ?>)</a></li>
                </ul>
            </nav>
        </div>
    </div>
</header>