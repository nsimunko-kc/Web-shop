<div id="paypal-form-container">
    <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="upload" value="1">
        <input type="hidden" name="business" value="diveintofame@gmail.com">
        <input type="hidden" name="currency_code" value="EUR">

        <?php
        $session_array = $_SESSION['cart'];
        $i = 1;

        foreach($session_array as $item)
        {
            $pid = $item[0];
            $size = $item[1];
            $amount = $item[2];

            $sql = 'SELECT * FROM dif_items WHERE id = ' . $pid . ' LIMIT 1';
            $result = $db->getDataFromDB($conn, $sql);

            if ($result->num_rows > 0)
            {
                while ($row = mysqli_fetch_assoc($result))
                {
                    $itemName = $row['item_name'];
                    $itemPrice = $row['item_price'];

                    ?>
                    <input type="hidden" name="item_name_<?php echo $i; ?>" value="<?php echo $itemName.', size: '.$size.', amount: '.$amount; ?>">
                    <input type="hidden" name="item_number_<?php echo $i; ?>" value="<?php echo $pid; ?>">
                    <input type="hidden" name="amount_<?php echo $i; ?>" value="<?php echo $itemPrice; ?>">
                    <input type="hidden" name="quantity_<?php echo $i; ?>" value="<?php echo $amount; ?>">
                    <input type="hidden" name="handling_<?php echo $i; ?>" value="0">
                    <input type="hidden" name="shipping_<?php echo $i; ?>" value="0">
                    <input type="hidden" name="shipping2_<?php echo $i; ?>" value="0">
                    <?php
                }
            }
            else
            {
                die("MySql error!");
            }
            $i++;
        }

        ?>
        <input type="image"
        src="http://www.paypal.com/en_US/i/btn/x-click-but01.gif"
        name="submit"
        alt="Make payments with PayPal - it's fast, free and secure!">
    </form>
</div>