<?php
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

if(!isset($_POST['itemID']) || $_POST['itemID'] == '' ||
	!isset($_POST['itemAmount']) || $_POST['itemAmount'] == '' ||
	!isset($_POST['itemSize']) || $_POST['itemSize'] == '')
{
	$result["success"] = 0;
	$result["msg"] = "Item not set.";
}
else 
{
	$itemID = stripslashes($_POST["itemID"]);
	$itemSize = stripslashes($_POST['itemSize']);
	$itemAmount = stripslashes($_POST['itemAmount']);

	$sql = "SELECT * FROM dif_items WHERE id = $itemID LIMIT 1";
	$data = $db->getDataFromDB($conn, $sql);

	$totalPrice = 0.0;

	if($data->num_rows > 0)
	{
		$row = mysqli_fetch_assoc($data);

		$result["success"] = 1;
		$result["msg"] = "Item found.";
		$result["itemName"] = $row['item_name'];
		$result["itemPrice"] = $row['item_price'];
		$result["itemID"] = $row['id']; 
		$result["itemAmount"] = $itemAmount;
		$result["itemSize"] = $itemSize;

		if(!isset($_SESSION['cart']) && isset($_SESSION['cart']) == '')
		{
			// the cart is empty
			$_SESSION['cart'] = array(array($itemID, $itemSize, $itemAmount));
			$totalPrice = $itemAmount * $row['item_price'];
		}
		else
		{
			// the cart is not empty
			$_SESSION['cart'][] = array($itemID, $itemSize, $itemAmount);
			$sessionArray = $_SESSION['cart'];
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
		}

		$result["totalPrice"] = $totalPrice;
	}
	else
	{
		$result["success"] = 0;
		$result["msg"] = "Item ID doesn\'t match any items in db.";
	}

}

header('Content-Type: application/json');
echo json_encode($result);



$db->closeConnection($conn);
?>