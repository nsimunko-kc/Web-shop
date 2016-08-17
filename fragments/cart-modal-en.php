<?php
if(isset($_SESSION['cart']))
{
    $cartEmpty = false;
}
else
{
    $cartEmpty = true;
}
?>
<!-- Modal Structure -->
<div id="modal1" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h4>My cart content</h4>
        <table>
            <thead>
                <tr>
                    <th data-id="name">Name</th>
                    <th data-id="amount">Amount</th>
                    <th data-id="price-pu">Price per unit</th>
                    <th data-id="price">Price</th>
                    <th data-id="remove-item">Remove</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if($cartEmpty)
            {
                echo '<tr id="noItemRow"><td colspan="5">There are no items in the cart.</td></tr>';
                $totalPrice = 0;
            }
            else
            {
                $session_array = $_SESSION['cart'];
                $totalPrice = 0.0;
                $noOfItems  = 0;
                $i = 1;

                foreach ($session_array as $item)
                {
                    $pid = $item[0];
                    $size = $item[1];
                    $amount = $item[2];

                    $sql = 'SELECT * FROM dif_items WHERE id = ' . $pid . ' LIMIT 1';
                    $result = $db->getDataFromDB($conn, $sql);

                    if($result->num_rows > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            echo '<tr>';
                            echo '<td>' . $row['item_name'] . ' - ' . strtoupper($size) . '</td>';
                            echo '<td>'. $amount .'</td>';
                            echo '<td>'. $row['item_price'] .'</td>';
                            echo '<td>'. $row['item_price'] * $amount .'</td>';
                            echo '<td><a href="javascript:removeItemFromCart('. ($i-1) .');">X</a></td>';
                            echo '</tr>';

                            $totalPrice += $amount * $row['item_price'];
                            $noOfItems += $amount;
                        }
                    }
                    $i++;
                }
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td class="center-align" id="totalPrice" style="font-weight: bold;" colspan="5">Total price: <?php echo $totalPrice; ?> &euro;</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-action modal-close waves-effect btn-flat">Close</a>
        <a href="checkout" class="modal-action modal-close waves-effect btn-flat">Checkout</a>
    </div>
</div>
