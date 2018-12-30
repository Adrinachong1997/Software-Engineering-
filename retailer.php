<?php
require("dbconfig.php");
require("orderModel.php");
require("playerModel.php");
$result = updateweek();
if ($rs = mysqli_fetch_assoc($result)) {
	$week=$rs['week']; 
}
$cid = 4;
$player_n = "retailer";
?>
<!DOCTYPE html>
<html>
<head>
	<title> 零售商</title>
</head>

<body>
    <H1><?php echo $player_n?></H1>
	<form method="post" action="orderControl.php">
		<p>目前是第<?php echo$week;?>周</p>
        <p>消費者要求啤酒數量：</p>
		請輸入本週訂購的啤酒數量:
		<input type = "hidden" name="week" value="updateweek"/>
		<input type = "hidden" name="order" value="update"/>
		<input type="text" name="sumbit">
		<input type="submit"  value=" 下單 " />
		<!--<input type="hidden" name="act" value="reset">-->
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
		$result = orderList();
		while (	$rs = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" , $rs['week'] ,
			"</td><td>" , $rs['original_stock'],
			"</td><td>" , $rs['expected_arrival'],
			"</td><td>" , $rs['actual_arrival'],
			"</td><td>" , $rs['orders'],
			"</td><td>" , $rs['cost'],
			"</td><td>" , $rs['acc_cost'],
			"</td><td>" , $rs['demand'],
			"</td><td>" , $rs['actual_shipment'];
		
		}
			?>
    </table>
</body>
</html>