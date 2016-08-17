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

    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="../style/mainStyle.css">
    <link rel="stylesheet" type="text/css" href="../style/collections.css">
    <script src="../js/jQuery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
</head>
<body>
<?php require_once('../fragments/header-en.php') ?>
<main>
    <div class="row">
        <div class="col s12 m6 l3 collection-div">
            <figure>
            <a href="shop?cid=1">
                <img src="../img/thumbs/art1-thumb.jpg">
                <figcaption>
                    <h5>Example art, by Example Artist</h5>
                    <div class="divider"></div>
                </figcaption>
            </a>
            </figure>
        </div>
        <div class="col s12 m6 l3 collection-div">
            <figure>
            <a href="shop?cid=1">
                <img src="../img/thumbs/art2-thumb.jpg">
                <figcaption>
                    <h5>Example art, by Example Artist</h5>
                    <div class="divider"></div>
                </figcaption>
            </a>
            </figure>
        </div>
        <div class="col s12 m6 l3 collection-div">
            <figure>
            <a href="shop?cid=1">
                <img src="../img/thumbs/art3-thumb.jpg">
                <figcaption>
                    <h5>Example art, by Example Artist</h5>
                    <div class="divider"></div>
                </figcaption>
            </a>
            </figure>
        </div>
        <div class="col s12 m6 l3 collection-div">
            <figure>
            <a href="shop?cid=1">
                <img src="../img/thumbs/LKL-thumb.jpg">
                <figcaption>
                    <h5>Example art, by Example Artist</h5>
                    <div class="divider"></div>
                </figcaption>
            </a>
            </figure>
        </div>
        <div class="col s12 m6 l3 collection-div">
            <figure>
            <a href="shop?cid=1">
                <img src="../img/thumbs/LKL-thumb.jpg">
                <figcaption>
                    <h5>Example art, by Example Artist</h5>
                    <div class="divider"></div>
                </figcaption>
            </a>
            </figure>
        </div>
    </div>
</main>
</body>
<script src="../js/script.js"></script>
<script src="../js/ajaxScripts.js"></script>
</html>

<?php
$db->closeConnection($conn);
?>
