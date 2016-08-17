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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order</title>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed' rel='stylesheet' type='text/css'>
    <style type="text/css">
        * {
            font-family: 'Roboto Condensed', sans-serif;
        }
        form, div#home {
            margin: 0 auto;
            margin-top: 15%;
            width: 300px;
        }
        a {
            color: #3949ab;
        }
        a:hover {
            color: black;
        }
    </style>
</head>
<body>
<?php if(isset($_POST['payment']) && $_POST['payment'] == 'paypal'): ?>
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_ext-enter">
        <input type="hidden" name="redirect_cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="business" value="diveintofame@gmail.com">
        <input type="hidden" name="currency_code" value="EUR">
<?php endif; ?>

<?php
if(isset($_POST['email']) &&
    isset($_POST['first_name']) &&
    isset($_POST['last_name']) &&
    isset($_POST['address']) &&
    isset($_POST['area_code']) &&
    isset($_POST['city']) &&
    isset($_POST['country']))
{
    $first_name = htmlspecialchars($_POST['first_name']);
    $last_name = htmlspecialchars($_POST['last_name']);
    $address = htmlspecialchars($_POST['address']);
    $email = htmlspecialchars($_POST['email']);
    $city_code = htmlspecialchars($_POST['area_code']);
    $country = htmlspecialchars($_POST['country']);
    $city = htmlspecialchars($_POST['city']);

    $phone = '';
    $comment = '';

    if(isset($_POST['phone']))
        $phone = htmlspecialchars($_POST['phone']);
    if(isset($_POST['comment']))
        $comment = htmlspecialchars($_POST['comment']);

    if(!empty($first_name) &&
        !empty($last_name) &&
        !empty($address) &&
        !empty($email) &&
        !empty($city_code) &&
        !empty($city) &&
        !empty($country))
    {
        $shipping = 0;

        $sql = 'SELECT * FROM dif_countries WHERE country = "'. $country .'"';
        $result = $db->getDataFromDB($conn, $sql);
        if($result->num_rows == 0)
        {
            die($result);
            header('Location: error?err=invalid_input');
        }

        $row = mysqli_fetch_assoc($result);
        $shipping = intval($row['shipping']);
        $shippingTemp = $shipping;

        if(isset($_POST['payment']) && $_POST['payment'] == 'paypal')
        {
            ?>
            <input type="hidden" name="email" value="<?= $email ?>">
            <input type="hidden" name="first_name" value="<?= $first_name ?>">
            <input type="hidden" name="last_name" value="<?= $last_name ?>">
            <input type="hidden" name="address1" value="<?= $address ?>">
            <input type="hidden" name="city" value="<?= $city ?>">
            <input type="hidden" name="state" value="<?= $country ?>">
            <input type="hidden" name="zip" value="<?= $city_code ?>">
            <?php
        }

        $buyer_subject = "DiveIntoFame order";

        $order_to = "orders@diveintofame.com";
        $order_subject = "Order information";
        $order_msg = "";
        $buyer_msg = "";

        /*$order_headers = 'MIME-Version: 1.0' . "\r\n";
        $order_headers .= 'Content-Type: text/plain; charset=UTF-8' . "\r\n";
        $order_headers .= 'Content-Transfer-Encoding: 8bit' . "\r\n";*/

        $order_headers = "";
        $buyer_headers = $order_headers .'From: orders@diveintofame.com' . "\r\n" . 'Reply-To: info@diveintofame.com' . "\r\n"; 
        

        $session_array = $_SESSION['cart'];
        $i = 1;

        $order_msg .= "Order information:\r\n\r\n";

        $totalPrice = 0.0;
        $totalAmount = 0;

        foreach($session_array as $item) 
        {
            $pid = $item[0];
            $size = $item[1];
            $amount = $item[2];
            $totalAmount += $amount;

            $sql = 'SELECT * FROM dif_items WHERE id = ' . $pid . ' LIMIT 1';
            $result = $db->getDataFromDB($conn, $sql);

            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $itemName = $row['item_name'];
                    $itemPrice = $row['item_price'];

                    if(isset($_POST['payment']) && $_POST['payment'] == 'paypal')
                    {
                        ?>
                        <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $itemName.', size: '.$size.', amount: '.$amount; ?>">
                        <input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $pid; ?>">
                        <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $itemPrice; ?>">
                        <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $amount; ?>">
                        <input type="hidden" name="handling_<?php echo $i; ?>" value="0">
                        <input type="hidden" name="shipping_<?= $i ?>" value="<?= $shippingTemp ?>">
                        <?php
                        $shippingTemp = 0;
                    }

                    $order_msg .= "Item: " . $itemName . ", size: " . $size . ", amount: " . $amount;
                    $order_msg .= "\r\n" . "Price: " . $amount * $itemPrice;
                    $order_msg .= "\r\n\r\n";

                    $totalPrice += $amount * $itemPrice;
                }
            }
            $i++;
        }

        $order_msg .= "Shipping: ". $shipping . " EUR\r\n";
        $order_msg .= "Total price: ". $totalPrice ." EUR\r\n";
        $order_msg .= "With shipping: ". ($totalPrice + $shipping) . " EUR\r\n\r\n";

        $payedWithPayPal = 0;
        if($_POST['payment'] == 'paypal')
        {
            $order_msg .= "Payed with PayPal\r\n\r\n";
            $payedWithPayPal = 1;
        }

        $order_msg .= "Buyer information:\r\n";
        $order_msg .= $first_name . " " . $last_name . "\r\n";
        $order_msg .= "Email: ". $email ."\r\n";
        $order_msg .= "Address: ". $address .", ". $city .", ". $city_code .", ". $country ."\r\n";
        $order_msg .= "Phone: ". $phone ."\r\n\r\n";
        $order_msg .= "Comment: \r\n";
        $order_msg .= $comment ."\r\n";

        $order_msg = $order_msg;
        $buyer_msg = $order_msg;

        $db->insertDataIntoDB($conn, "SET NAMES 'utf8'");
        $db->insertDataIntoDB($conn, "SET CHARACTER_SET 'utf8'");

        $sql = 'INSERT INTO dif_clients ';
        $sql .= '(client_first_name, client_last_name, client_email, client_address, client_city, client_area_code, client_country, client_phone, client_comment) VALUES ';
        $sql .= '("'.$first_name.'","'.$last_name.'","'.$email.'","'.$address.'","'.$city.'","'.$city_code.'","'.$country.'","'.$phone.'","'.$comment.'")';

        $db->insertDataIntoDB($conn, $sql);
        $lastID = mysqli_insert_id($conn);

        $sql = 'INSERT INTO dif_orders ';
        $sql .= '(order_timestamp, client_id, paypal, item_amount, total_price) VALUES ';
        $sql .= '(NOW(), '.$lastID.', '.$payedWithPayPal.', '.$totalAmount.', '.($totalPrice + $shipping).')';

        $db->insertDataIntoDB($conn, $sql);
        $lastOrderID = mysqli_insert_id($conn);

        if(!file_exists("../logs/orders/".date("Y")))
        {
            mkdir("../logs/orders/".date("Y"));

            if(!file_exists("../logs/orders/".date("Y")."/".date("M")))
            {
                mkdir("../logs/orders/".date("Y")."/".date("M"));
            }
        }

        $logFile = fopen("../logs/orders/".date("Y")."/".date("M")."/".$lastOrderID.".txt", "w");

        fwrite($logFile, $order_msg);

        mail($order_to, $order_subject, $order_msg, $order_headers);
        mail($email, $buyer_subject, $buyer_msg, $buyer_headers);

        $_SESSION['cart'] = "";
        unset($_SESSION['cart']);

    }
    else 
    {
        header('Location: error?err=db');
    }
} else
{
    header('Location: checkout');
}
?>

<?php if(isset($_POST['payment']) && $_POST['payment'] == 'paypal'): ?>
    <input type="image"
        src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif"
        name="submit"
        alt="Make payments with PayPal - it's fast, free and secure!">
        <p>Total price (with shipping): <?= ($totalPrice + $shipping) ?></p>
        <p>Thank you for your purchase.</p>
        <p>Check your e-mail for purchase confirmation.</p>
        <p>Please confirm your order in PayPal.</p>
</form>
<?php elseif(isset($_POST['payment']) && $_POST['payment'] == 'delivery'): ?>
    <div id="home">
        <p>Total price (with shipping): <?php echo ($totalPrice + $shipping) ." EUR" ?></p>
        <p>Thank you for your purchase.</p>
        <p>Check your e-mail for purchase confirmation.</p>
        <a href="index">Go back home</a>
    </div>
<?php endif; ?>
  
</body>
</html>

<?php
$db->closeConnection($conn);

