<?php
require("dbconfig.php");
require("orderModel.php");
require("playerModel.php");
global $db;
$pid=4;
$tname=1;
?>
<!DOCTYPE html>
<html>
<head>
	<title> 零售商</title>
</head>

<body>
    <H1>Retailer</H1>
	<?php include("formTemplate.php"); ?>
	
	<hr>
    <table style="width: 100%">
	    <thead>
			<tr>
				<td>週次</td>
				<td>庫存</td>
				<td>預期到貨</td>
				<td>實際到貨</td>
				<td>訂單</td>
				<td>成本</td>
				<td>累積成本</td>
				<td>需求</td>
				<td>實際出貨</td>
	    	</tr>
		</thead>
		<tbody>
			<?php
				$result = getOrderList($tname,$pid);
				while (	$rs = mysqli_fetch_assoc($result)) {
					echo 
					"<tr>",
					"<td>" , $rs['week'] , "</td>",
					"<td>" , $rs['original_stock'], "</td>",
					"<td>" , $rs['expected_arrival'], "</td>",
					"<td>" , $rs['actual_arrival'], "</td>",
					"<td>" , $rs['orders'], "</td>",
					"<td>" , $rs['cost'], "</td>",
					"<td>" , $rs['acc_cost'], "</td>",
					"<td>" , $rs['demand'], "</td>",
					"<td>" , $rs['actual_shipment'], "</td>",
					"</tr>";
				
				}
			?>
		</tbody>
    </table>
</body>
</html>