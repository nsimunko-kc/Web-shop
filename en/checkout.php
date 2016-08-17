<?php
session_start();
require_once('../includes/Database.php');

$db = new Database();
$conn = $db->connectToDatabase();

if(!isset($_SESSION['cart']))
{
    header('Location: index');
}
else
{
    if(empty($_SESSION['cart']))
        header('Location: index');
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dive Into Fame - Checkout</title>
    
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../style/mainStyle.css">
    <link rel="stylesheet" type="text/css" href="../style/checkoutStyle.css">
    <script src="../js/jQuery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.0/js/materialize.min.js"></script>
</head>
<body>
<?php require_once('../fragments/header-en.php') ?>
<div class="modal" id="validateWarning">
    <div class="modal-content">
        <h4>Excuse me...</h4>
        <p>Please fill out all required forms.</p>
        <p>DiveIntoFame will not share your personal information with any legal or physical entities.</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close btn-flat">Close</a>
    </div>
</div>
<a class="modal-trigger" href="#validateWarning" id="warningTrigger"></a>
<section>
    <div class="row">
        <p id="disclaimer" class="col s12">
            <i class="material-icons prefix">verified_user</i> DiveIntoFame will keep your personal information safe.
        </p>
        <form class="col s12" method="post" action="orderDelivery.php" onsubmit="return validateForm();">
            <div class="row">
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="first_name" type="text" name="first_name" class="validate">
                    <label for="first_name">First Name</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">person_pin</i>
                    <input id="last_name" type="text" name="last_name" class="validate">
                    <label for="last_name">Last Name</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">email</i>
                    <input id="email" type="email" name="email" class="validate">
                    <label for="email">Email</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">phone</i>
                    <input id="phone" type="text" name="phone" class="validate">
                    <label for="phone">Phone (optional)</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">location_on</i>
                    <input id="address" type="text" name="address" class="validate">
                    <label for="address">Street</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">location_on</i>
                    <input id="city" type="text" name="city" class="validate">
                    <label for="city">City</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <i class="material-icons prefix">location_on</i>
                    <input id="area_code" type="text" name="area_code" class="validate">
                    <label for="area_code">Area code</label>
                </div>
                <div class="input-field col s12 m12 l6">
                    <select id="country" name="country" class="browser-default" onchange="changeShippingPrice()">
                        <option value="0" selected disabled>Country</option>
                        <?php

                        $sql = 'SELECT * FROM dif_countries ORDER BY country';
                        $result = $db->getDataFromDB($conn, $sql);

                        if($result->num_rows < 1)
                            header('Location: error.php?err=db');

                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo '<option value="'. $row['country'] .'">'. $row['country'] .'</option>';
                        }

                        ?>
                    </select>
                </div>
                <div class="input-field col s12">
                    <i class="material-icons prefix">comment</i>
                    <textarea id="comment" class="materialize-textarea" name="comment"></textarea>
                    <label for="comment">Leave a comment (optional)</label>
                </div>
                <div class="col s12">
                    <p id="shipping-price">Shipping: Select your country!</p>
                </div>
                <div class="input-field col s12">
                    <p>Payment options:</p>
                    <p>
                        <input name="payment" type="radio" id="paypal" value="paypal" />
                        <label for="paypal">PayPal</label>
                    </p>
                    <p>
                        <input name="payment" type="radio" id="on-delivery" value="delivery" checked />
                        <label for="on-delivery">On delivery (RH &amp; BiH only)</label>
                    </p>
                </div>
                <div class="input-field col s12">
                    <input type="submit" value="Buy" class="btn black">
                </div>
            </div>
        </form>
    </div>
</section>
</body>
<script src="../js/script.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#warningTrigger").leanModal();
    });
</script>
</html>
<?php
$db->closeConnection($conn);