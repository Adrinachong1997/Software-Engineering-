<?php
require("dbconfig.php");
require("orderModel.php");
require("playerModel.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title> 零售商</title>
</head>

<body>
    <H1>Retailer</H1>
	<form method="post" action="orderControl.php">
	<input type = "hidden" name="operation" value="updateweek"/>
		<p>目前是第
		<?php //從period撈目前週次
			$result= getCurrentPeriod();
			while($rs=mysqli_fetch_assoc($result)){
				echo $rs['no'];
			}
		?>
		周</p>
		<p>消費者要求啤酒數量：<?php //從gamecycle撈目前的消費者要去
		$result= getCurrentDemand();
		if($rs=mysqli_fetch_assoc($result)){
			echo $rs['setno'];
		}
		?></p>
		請輸入本週訂購的啤酒數量:<?php?>
		<input type ="hidden" name="operation" value="update"/>
		<input type ="text" name="order">
		<input type ="submit" value=" 下單 " />
		 
	</form>
	<form method="post" action="orderControl.php">
	<input type = "hidden" name="operation" value="reset"/>
    <input type = "submit" value = "重置"> 
</form>
	<hr>
    <table style="width: 100%">
	    <tbody><tr>
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
		<?php
		$result = getOrderList();
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
    </table>
</body>
</html>