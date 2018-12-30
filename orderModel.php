<?php
require("dbconfig.php");
/*function addOrder(){
    global $db;
    $sql = "insert into player_record(order) values(7)";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt); 
    return $result;
}*/
function updateOrder($sumbit,$orders){
    global $db;
    
    $sql = "INSERT INTO `player_record`(id,cid,week,original_stock,expected_arrival,actual_arrival,orders,cost,acc_cost,demand,actual_shipment)
    values(1,1,1,15,0,0,?,15,0,0,0)";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$sumbit);
    mysqli_stmt_execute($stmt); 
	return ;
}
function orderList() 
{
    global $db;
    $sql = "select * from player_record ";
    $stmt = mysqli_prepare($db, $sql);
    //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result;
}
