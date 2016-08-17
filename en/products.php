<?php
session_start();
require_once('../includes/Database.php');

$db = new Database();
$conn = $db->connectToDatabase();

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dive Into Fame</title>

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

    <link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style/productStyle.css">
    <script src="../js/jQuery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
</head>
<body>
    <?php
        require_once ('../fragments/header-en.php');
    ?>
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
                    <td>
                        <input type="number" value="1" id="amount" class="browser-default">
                        <input type="hidden" value="<?php echo htmlspecialchars($_GET['pid']); ?>" id="itemID">
                    </td>
                </tr>
            </table>
        </div>
        <div class="modal-footer">
            <a href="javascript:addItemToCart();" id="addToCartBtn" class="modal-action modal-close btn-flat">Add to cart</a>
        </div>
    </div>
    <main>
    
    <?php if(!isset($_GET['pid'])): ?>
        <section id="all-products">
            <?php 

            $sql = 'SELECT * FROM dif_items';
            $result = $db->getDataFromDB($conn, $sql);

            if($result->num_rows < 1)
                header('Location: error?err=db');

            while($row = mysqli_fetch_assoc($result))
            {
                $sql_img = 'SELECT thumb_name FROM dif_thumbs WHERE item_id = '. $row['id'] .' LIMIT 1';
                $result_new = $db->getDataFromDB($conn, $sql_img);

                if($result_new->num_rows < 1)
                    header('Location: error?err=db');

                $row_new = mysqli_fetch_assoc($result_new);

                echo '<figure><a href="products?pid='. $row['id'] .'"><img src="../img/thumbs/'. $row_new['thumb_name'] .'"><figcaption>'. $row['item_name'] .'<div class="divider"></div></figcaption></a></figure>';
            }

            ?>
        </section>
    <?php else: ?>
        <aside>
            <?php

            $sql = 'SELECT * FROM dif_images WHERE item_id = '. htmlspecialchars($_GET['pid']);
            $result = $db->getDataFromDB($conn, $sql);

            if($result->num_rows < 1)
                header('Location: error?err=db');

            $i = 1;
            while($row = mysqli_fetch_assoc($result))
            {
                echo '<figure>';
                    echo '<a href="javascript:void();" data-num="'. $i .'">';
                        echo '<img src="../img/items/'. $row['img_name'] .'">';
                    echo '</a>';
                echo '</figure>';
                $i++;
            }

            ?>
        </aside>
        <section id="one-product">
            <div class="slider">
                <ul class="slides">
                    <?php

                    $sql = 'SELECT * FROM dif_images WHERE item_id = '. htmlspecialchars($_GET['pid']);
                    $result = $db->getDataFromDB($conn, $sql);

                    if($result->num_rows < 1)
                        header('Location: error?err=db');

                    while($row = mysqli_fetch_assoc($result))
                    {
                        echo '<li>';
                            echo '<img src="../img/items/'. $row['img_name'] .'">';
                        echo '</li>';
                    }

                    ?>
                </ul>
            </div>
            <div id="product-info">
                <a href="#addToCartModal" id="addToCartLink" class="modal-trigger btn grey darken-4 right">
                    Add to cart
                    <i class="material-icons right">shopping_cart</i>
                </a>
                <?php

                $sql = 'SELECT * FROM dif_items WHERE id = '. htmlspecialchars($_GET['pid']);
                $result = $db->getDataFromDB($conn, $sql);

                if($result->num_rows < 1)
                    header('Location: error?err=db');

                $row = mysqli_fetch_assoc($result);

                echo '<h4 id="productName">'. $row['item_name'] .'</h4>';
                echo '<h5 id="productPrice" data-price="'. $row['item_price'] .'">Price: '. $row['item_price'] .'&euro;</h5>';
                echo '<p>'. $row['item_desc'] .'</p>';

                ?>
            </div>
        </section>
        <div style="clear: both;"></div>
        
        <div class="divider"></div>
        <h4>Other products in the same collection</h4>
        <section id="other-products">
            <?php

            $sql = 'SELECT * FROM dif_thumbs WHERE item_id IN (SELECT id FROM dif_items WHERE collection_id = (SELECT collection_id FROM dif_items WHERE id = '. htmlspecialchars($_GET['pid']) .' AND item_id <> '. htmlspecialchars($_GET['pid']) .' LIMIT 1))';
            $result = $db->getDataFromDB($conn, $sql);

            if($result->num_rows < 1)
                header('Location: error?err=db');

            while($row = mysqli_fetch_assoc($result))
            {
                echo '<figure>';
                    echo '<a href="products?pid='. $row['item_id'] .'">';
                        echo '<img src="../img/thumbs/'. $row['thumb_name'] .'">';
                        $sql_new = 'SELECT item_name FROM dif_items WHERE id = '. $row['item_id'];
                        $result_new = $db->getDataFromDB($conn, $sql_new);
                        $name = mysqli_fetch_assoc($result_new);
                        echo '<figcaption>'. $name['item_name'] .'<div class="divider"></div></figcaption>';
                    echo '</a>';
                echo '</figure>';
            }

            ?>        
            </section>
    <?php endif; ?>
    </main>
</body>
<script type="text/javascript">
    $("#header-right").find("img").attr("src", "../img/logo-new-white-right.png");

    $(document).ready(function() {
        $(".my-cart-trigger").leanModal();
        $("#addToCartLink").leanModal();
        $(".slider").slider({interval: 3000});

        $(".my-cart-trigger").data("color", "black");
    });

    $(".slider").mouseenter(function() {
        $(".slider").slider("pause");
    });
    $(".slider").mouseleave(function() {
        $(".slider").slider("start");
    });

    $(document).scroll(function() {
        if($(window).scrollTop() == 0) {
            $("main").animate({
                "padding-top": "150px"
            }, {
                duration: 50, queue: false
            });
            $("header img").animate({
                height: "50px"
            }, {
                duration: 250, queue: false
            });

        } else {
            $("main").animate({
                "padding-top": "60px"
            }, {
                duration: 50, queue: false
            });
            $("header img").animate({
                height: "30px"
            }, {
                duration: 100, queue: false
            });
        }
    });

    $("aside").find("a").click(function() {
        var num = $(this).data("num");
        $(".slider").slider("pause");

        $("#one-product").find(".slider").find("li.active").removeClass("active");
        $("#one-product").find(".slider").find(".indicators").find("li:nth-child("+ num.toString() +")").trigger("click");

        $(".slider").slider("start");
    });
</script>
<script type="text/javascript" src="../js/ajaxScripts.js"></script>
</html>

<?php
$db->closeConnection($conn);
?>