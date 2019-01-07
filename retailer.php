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
$pid=4;
?>


<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {  
border: 1px solid #ddd;
text-align: left;
}

table {
  border-collapse: collapse;
  width: 100%
}

th, td {
  padding: 15px;
}
table {
  border-collapse: collapse;
  width: 100%;
}

th,td {
  text-align: left;
  padding: 10px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
	<title> 零售商</title>
</head>

<body>
	<H1>Retailer</H1>
	
	<?php include("formTemplate.php"); ?>
	
	<hr>
	<div style="overflow-x:auto;">
    <table style="width: 100%">
			<tr>
				<th>週次</th>
				<th>庫存</th>
				<th>預期到貨</th>
				<th>實際到貨</th>
				<th>訂單</th>
				<th>成本</th>
				<th>累積成本</th>
				<th>需求</th>
				<th>實際出貨</th>
	    	</tr>
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
	</table>
</div>
</body>
</html>