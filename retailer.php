
<?php
require("dbconfig.php");
$sql = "select * from retailer,gamecycle";
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
	<title> R1 零售商</title>
</head>

<body>
    <H1>Retailer</H1>
	<form>
		<p>目前是第<?php echo $no; ?>周</p>
        <p>消費者要求啤酒數量：<?php echo $setno;?></p>
		請輸入本週訂購的啤酒數量:<input type="text" name="num beer">
		<input type="submit" value="Submit">
	</form>
	<hr>
    <table style="width: 100%">
	    <tbody><tr>
		    <td>週次</td>
			<td>庫存量</td>
			<td>訂貨量</td>
		    <td>當期成本</td>
		    <td>累計成本</td>
			<td>需求量</td>
			<td>銷售量</td>
			<td>在途量</td>
	    </tr>
		<?php

		while (	$rs = mysqli_fetch_assoc($result)) {
			echo "<tr><td>" , $rs['no'] ,
			"</td><td>" , $rs['stock'],
			"</td><td>" , $rs['orders'],
			"</td><td>" , $rs['current_cost'],
			"</td><td>" , $rs['accumulation_cost'],
			"</td><td>" , $rs['demand'],
			"</td><td>" , $rs['total_sales'],
			"</td><td>" , $rs['incoming_stock'];

		}
			?>
    </table>
</body>
</html>