<?php

require_once("../includes/Database.php");

$db = new Database;

$conn = $db->connectToDatabase();

if(!$db->connectionStatus)
	die("Database connection error.");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">

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
    <link href="../style/materialize.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jQuery.js"></script>
    <script src="../js/materialize.min.js"></script>

	<title>Product stock info</title>

	<style type="text/css">
		table {
			width: 95%;
			max-width: 1200px;
			margin: 0 auto;
		}
		table a {
			color: black;
		}
		table a:hover {
			color: gray;
		}
		#img-modal {
			width: 30%;
		}
	</style>
</head>
<body>
	<div id="img-modal" class="modal">
	    <div class="modal-content">
	      	<h4>Product image</h4>
	      	<img src="">
	    </div>
	    <div class="modal-footer">
	      	<a href="#!" class=" modal-action modal-close waves-effect btn-flat">Close</a>
	    </div>
  	</div>
	<table class="bordered striped">
		<thead>
			<tr>
				<th>#</th>
				<th>ID</th>
				<th>Name</th>
				<th>Price</th>
				<th>S</th>
				<th>M</th>
				<th>L</th>
				<th>XL</th>	
			</tr>
		</thead>
		<tbody>
			<?php

			$sql = 'SELECT * FROM dif_items';
			$result = $db->getDataFromDB($conn, $sql);

			if($result->num_rows < 1)
			{
				?>
				<tr>
					<td colspan="8">No data received from database!</td>
				</tr>
				<?php
			}
			else
			{
				$i = 1;
				while ($row = mysqli_fetch_assoc($result)) {
					$sql_img = 'SELECT * FROM dif_thumbs WHERE item_id = '. $row['id'] .' LIMIT 1';
					$result_2 = $db->getDataFromDB($conn, $sql_img);
					$img = mysqli_fetch_assoc($result_2);

					echo '<tr>';
					echo "<td>$i</td>";
					echo '<td>'.$row['id'].'</td>';
					echo '<td><a href="#img-modal" class="modal-trigger img-link" data-src="'.$img['thumb_name'].'">'.$row['item_name'].'</a></td>';
					echo '<td>'.$row['item_price'].' &euro;</td>';
					echo '<td>'.$row['S'].'</td>';
					echo '<td>'.$row['M'].'</td>';
					echo '<td>'.$row['L'].'</td>';
					echo '<td>'.$row['XL'].'</td>';
					echo '</tr>';

					$i++;
				}
			}

			?>
		</tbody>
	</table>
</body>
<script type="text/javascript">
	$(document).ready(function() {
		$(".img-link").leanModal();
	});

	$(".img-link").click(function() {
		var src = $(this).data("src");
		$("#img-modal").find("img").attr("src", "../img/thumbs/" + src);
	});
</script>
</html>
<?php
$db->closeConnection($conn);
?>