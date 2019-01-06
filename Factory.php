<?php
//$tname = $_GET['tname'];
require("dbconfig.php");
require("orderModel.php");
require("playerModel.php");
require("newBG/gameModel.php");
global $db;
//setTeamName($tname,$pid);
session_start();
if(isset($_GET['tname'])){
	//session_start();
	$_SESSION['tname']=$_GET['tname'];
	$tname = $_GET['tname'];
}else if (isset($_SESSION['tname'])){
	$tname = $_SESSION['tname'];
}
echo "你現在的隊伍是:$tname";
$tname = $_SESSION['tname'];
$pid=1;
?>
<!DOCTYPE html>
<html>
<head>
	<title>工廠</title>
</head>

<body>
    <H1>Factory</H1>
	<?php include("formTemplate.php"); ?>
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
		$result =getOrderList($tname,$pid);
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