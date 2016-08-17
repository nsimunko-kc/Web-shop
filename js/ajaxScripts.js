
function addItemToCart () 
{
	var itemAmount = $("#amount").val();
	var itemSize = $("#size").val();
	var itemID = $("#itemID").val();

	$.post(
		"../includes/addItemToCart",
		{
			itemID: itemID,
			itemSize: itemSize,
			itemAmount: itemAmount
		},
		function(result) 
		{
			if(result.success == 1)
			{
				$("#modal1").find("#noItemRow").remove();
				$("#modal1").find("#totalPrice").html("Total price: " + result.totalPrice + " &euro;");
				$("#modal1").find("tbody").append(
					"<tr>" +
					"<td>"+ result.itemName +" - "+ result.itemSize.toUpperCase() +"</td>" +
					"<td>"+ result.itemAmount +"</td>" +
					"<td>"+ result.itemPrice +"</td>"+
					"<td>"+ result.itemPrice * result.itemAmount +"</td>" +
					'<td><a href="javascript:removeItemFromCart('+ getRowCount() +')">X</a></td>' +
	 				+ "</tr>"
				);
			}
		}
	).done(function() {
		$(".my-cart-trigger").css("color", "red");
	}).fail(function() {
		console.log("Ajax error!");
	});
}

function removeItemFromCart (itemNum) 
{
	$.post(
		"../includes/removeItemFromCart",
		{
			itemNum: itemNum
		},
		function(result)
		{
			// remove item from cart modal
			console.log(result);
			if(result.success == 1)
			{
				$("#modal1 tbody tr:nth-child(" + (parseInt(result.itemNum) + 1).toString() + ")").remove();
				$("#modal1").find("#totalPrice").html("Total price: " + result.totalPrice + " &euro;");
				reasignIDs();
			}
		}
	).done(function() {
		if(getRowCount() === 0)
		{
			var color = $(".my-cart-trigger").data("color");
			$(".my-cart-trigger").css("color", color);
		}
	}).fail(function() {
		
	});
}

function getRowCount()
{
	return $("#modal1 tbody tr").length;
}

function reasignIDs()
{
	$.each($("#modal1 tbody tr"), function(i, val) {
		$(this).find("td:last-child").find("a").attr("href", "javascript:removeItemFromCart(" + i + ")");
	});
}