<?php
require("dbconfig.php");
 
?>
<!DOCTYPE html>
<html>
<head>
	<title> 零售商</title>
</head>

<body>
    <H1>Retailer</H1>
	<form>
		<p>目前是第周</p>
        <p>消費者要求啤酒數量：</p>
		請輸入本週訂購的啤酒數量:<input type="text" name="num beer">
		<input type="submit" value="Submit">
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
		$sql = "select * from player_record where cid =4";
		$stmt = mysqli_prepare($db, $sql);
		mysqli_stmt_execute($stmt); //執行SQL
		$result = mysqli_stmt_get_result($stmt);
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