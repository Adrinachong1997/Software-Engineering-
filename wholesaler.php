<?php
require("dbconfig.php");
$sql = "select * from player_record,gamecycle";
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_execute($stmt); //執行SQL
$result = mysqli_stmt_get_result($stmt);

if ($rs=mysqli_fetch_assoc($result)) {
	$no=$rs['no'];  
	$setno=$rs['setno'];
}  
?>
<!DOCTYPE html>
<html>
<head>
	<title> 批發商</title>
</head>

<body>
    <H1>Wholesaler</H1>
	<form>
		<p>目前是第<?php echo $no; ?>周</p>
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
		$sql = "select * from player_record where cid =3";
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
			break;
		}
			?>
    </table>
</body>
</html>