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
    <title>Dive Into Fame - About Us</title>

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

    <link rel="stylesheet" type="text/css" href="../style/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../style/aboutStyle.css">
    <script src="../js/jQuery.js"></script>
    <script src="../js/materialize.min.js"></script>
</head>
<body>
<header>
    <div class="navigation">
        <ul>
            <li><a href="#modal1" class="my-cart-trigger" data-color="white" <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) echo 'style="color: red;"'; ?>>My Cart</a></li>
            <li><a href="about">About</a></li>
            <li><a href="black-white">Products</a></li>
            <li><a href="index">Home</a></li>
        </ul>
    </div>
</header>
<?php
require_once ('../fragments/cart-modal-en.php');
?>
<main>
    <div class="triangle-up-left"></div>
    <div class="triangle-down-right"></div>
    <section>
        <article id="first-p">
            <img src="../img/logo-new-black.png">
            <p>DIVE INTO FAME is a new clothing
                brand, established in Croatia by two
                young entrepreneurs. DIVE INTO
                FAME incorporates different styles of
                art on their wears. On one side there
                are artists and their paintings while on
                the other side there is a variety of
                geometrical shapes that gives a
                unique note to overall design.
                <br><br>
                DIVE INTO FAME is/was an ongoing
                idea for 3  years for one of the
                founders. After many different
                challenges and experiences DIVE
                INTO FAME was an obvious next
                challenge for a young entrepreneur.
                <br><br>
                DIVE INTO FAME aims to be a bridge
                between luxury good and somewhat
                alternative style. For those reasons
                there are two sub brands inside of
                DIVE INTO FAME.
            </p>
        </article>
        <article id="second-p">
            <p>
                In house so called 'DIVE INTO FAME'
                and the 'black label', they present
                opposite sides like in an YIN and
                YANG. 'Normal label' is aiming for
                regular people seeking for a high
                quality brand with reasonable price
                tags. On the other side there is so
                called 'black label' aiming for ones that
                are ready to risk with their style, also
                products coming out with a black label
                will be DIVE INTO FAME's premium
                products.
                <br><br>
                For the time being DIVE INTO FAME
                will be fully operating with goods
                bought from regional companies, for a
                full story of your wear double check
                the inner tag.<br>
                We hope that this is only a beginning,
                and that we'll be enjoying our time
                together. Because you are our
                strength.
                <br><br>
                <strong>DIVE INTO FAME</strong>
                <br><br>
                Contact: info@diveintofame.com
            </p>
        </article>
    </section>
</main>
</body>
<script type="text/javascript">
    $(document).ready(function() {
        $(".my-cart-trigger").leanModal();
    });
</script>
<script src="../js/ajaxScripts.js"></script>
</html>
<?php
$db->closeConnection($conn);
?>