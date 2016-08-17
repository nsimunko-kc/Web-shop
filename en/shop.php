<?php
session_start();
require_once('../includes/Database.php');

$db = new Database();
$conn = $db->connectToDatabase();

if(!isset($_GET['cid']))
{
    header('Location: error.php?err=page_not_found');
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dive Into Fame - Shop</title>
    
    <link rel="apple-touch-icon" sizes="57x57" href="../img/icons/apple-touch-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../img/icons/apple-touch-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../img/icons/apple-touch-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../img/icons/apple-touch-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../img/icons/apple-touch-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../img/icons/apple-touch-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../img/icons/apple-touch-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../img/icons/apple-touch-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../img/icons/apple-touch-icon-180x180.png">
    <link rel="icon" type="image/png" href="../img/icons/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="../img/icons/android-chrome-192x192.png" sizes="192x192">
    <link rel="icon" type="image/png" href="../img/icons/favicon-96x96.png" sizes="96x96">
    <link rel="icon" type="image/png" href="../img/icons/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="../img/icons/manifest.json">
    <meta name="msapplication-TileColor" content="#2d89ef">
    <meta name="msapplication-TileImage" content="../img/icons/mstile-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <script src="../js/jQuery.js"></script>
    <script src="../js/materialize.min.js"></script>
    <script src="../js/jquery.zoomooz.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="../style/materialize.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../style/shopStyle.css">
</head>
<body>
<?php require_once('../fragments/header-en.php'); ?>
<div id="addToCartModal" class="modal">
    <div class="modal-content">
        <h4>Choose your size &amp; amount:</h4>
        <table>
            <tr>
                <td>Size: </td>
                <td>
                    <select id="size" class="browser-default">
                        <option value="s">S</option>
                        <option value="m">M</option>
                        <option value="l" selected="">L</option>
                        <option value="xl">XL</option>
                    </select> 
                </td>
            </tr>
            <tr>
                <td>Amount: </td>
                <td><input type="number" value="1" id="amount" class="browser-default"></td>
            </tr>
        </table>
    </div>
    <div class="modal-footer">
        <a href="javascript:addItemToCart(1);" id="addToCartBtn" class="modal-action modal-close btn-flat">Add to cart</a>
    </div>
</div>
<div style="clear: both;"></div>
<main>
    <section id="collection-info">
        <img src="../img/thumbs/LKL-thumb.jpg" class="materialboxed" data-caption="Example collection by Example Artist">
        <p><a href="collections.php">&lt;&lt; Back to collections</a></p>
        <p>Example Collection</p>
        <p>by Example artist</p>
    </section>
    <div class="row">
        <section id="main-section" class="col s12 m8 right">
            
            <div class="slider">
                <ul class="slides">
                  <li>
                    <img src="http://lorempixel.com/800/600/fashion/5" class="zoomTarget" data-closeclick="1">
                  </li>
                  <li>
                    <img src="http://lorempixel.com/800/600/fashion/2" class="zoomTarget" data-closeclick="1">
                  </li>
                  <li>
                    <img src="http://lorempixel.com/800/600/fashion/3" class="zoomTarget" data-closeclick="1">
                  </li>
                  <li>
                    <img src="http://lorempixel.com/800/600/fashion/4" class="zoomTarget" data-closeclick="1">
                  </li>
                </ul>
            </div>

            <div id="product-info">
                <a href="#addToCartModal" id="addToCartLink" class="modal-trigger btn grey darken-4 right">
                    Add to cart
                    <i class="material-icons right">shopping_cart</i>
                </a>
                <h4 id="productName">I love music T-shirt, black</h4>
                <h5 id="productPrice" data-price="10">Price: 10&euro;</h5>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </section>
        <aside id="collection-products" class="col s12 m4 left">
            <div class="row">
                <figure class="col s6">
                    <a href="#!">
                        <img src="../img/gallery/shirt1.jpg">
                    </a>
                </figure>
                <figure class="col s6">
                    <a href="#!">
                        <img src="../img/gallery/shirt2.jpg">
                    </a>
                </figure>
                <figure class="col s6">
                    <a href="#!">
                        <img src="../img/gallery/shirt3.jpg">
                    </a>
                </figure>
                <figure class="col s6">
                    <a href="#!">
                        <img src="../img/gallery/shirt4.jpg">
                    </a>
                </figure>
                <figure class="col s6">
                    <a href="#!">
                        <img src="../img/gallery/shirt1.jpg">
                    </a>
                </figure>
            </div>
        </aside> 
    </div>
</main>
</body>
<script>
    $(document).ready(function() {
        $(".my-cart-trigger").leanModal();
        $(".slider").slider({interval: 3000});
        $("#addToCartLink").leanModal();
    });

    $(".slider").mouseenter(function() {
        $(".slider").slider("pause");
    });
    $(".slider").mouseleave(function() {
        $(".slider").slider("start");
    });

    $("#addToCartLink").click(function() {
        $("body").scrollTop(0);
    });
    
</script>
<script src="../js/ajaxScripts.js"></script>
</html>
<?php
$db->closeConnection($conn);
?>