<?php
// remove session cart item at index $_POST('itemNum')
// count session cart elements
// if num = 0 totalPrice = 0
// if num > 0 iterate over elements in cart & calculate totalPrice
session_start();

require_once("Database.php");
$db = new Database();
$conn = $db->connectToDatabase();

$result = array();

if(!$db->connectionStatus) 
{
	$result["success"] = 0;
	$result["msg"] = "Unable to connect to database!";
}

if(!isset($_POST['itemNum']) || $_POST['itemNum'] == '')
{
	$result['success'] = 0;
	$result['msg'] = 'Item not set!';
}
else
{
	$itemNum = stripslashes($_POST['itemNum']);

	$sessionArray = $_SESSION['cart'];
	unset($_SESSION['cart']);

	unset($sessionArray[$itemNum]);
	$sessionArray = array_values($sessionArray);

	$_SESSION['cart'] = $sessionArray;

	$result['success'] = 1;
	$result['msg'] = 'Item deleted.';
	$result['itemNum'] = $itemNum;

	$totalPrice = 0.0;

	foreach ($sessionArray as $item) 
	{
		$item_id = $item[0];
		$item_amount = $item[2];

		$sql_new = "SELECT * FROM dif_items WHERE id = $item_id LIMIT 1";
		$result_new = $db->getDataFromDB($conn, $sql_new);
		if($result_new->num_rows > 0)
		{
			$row_new = mysqli_fetch_assoc($result_new);
			$totalPrice += $row_new['item_price'] * $item_amount;
		}
	}

	$result['totalPrice'] = $totalPrice;
}


header('Content-Type: application/json');
echo json_encode($result);

$db->closeConnection($conn);
?>
