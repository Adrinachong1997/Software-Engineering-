<?php
require("dbconfig.php");
function updateOrder($order){
    global $db;
    $sql = "INSERT INTO 
    `player_record`
    (id,cid,week,original_stock,expected_arrival,actual_arrival,orders,cost,acc_cost,demand,actual_shipment)
    values
    (1,1,(SELECT MAX(no) FROM period),15,0,0,?,15,0,(select (setno) from gamecycle where no =(SELECT MAX(no) FROM period)),0)";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$order);
    mysqli_stmt_execute($stmt); 
	// return ;
}
function getOrderList() 
{
    global $db;
    $sql = "select * from player_record ";
    $stmt = mysqli_prepare($db, $sql);
    //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result;
}
function r_playerrecord(){//清除playerrecord資料庫
    global $db;
    $sql = "TRUNCATE TABLE player_record";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);  
	// return;
}
function updateactual_shipment($order){
    global $db;
    $sql = "UPDATE `player_record` SET `actual_shipment` = original_stock-demand";
    $stmt = mysqli_prepare($db, $sql);
	//mysqli_stmt_bind_param($stmt, "i",$order);
    mysqli_stmt_execute($stmt); 
}
/*function updateexpected_arrival($order,$week){
    global $db;
    if($week+2){
    $sql = "UPDATE `player_record` SET `expected_arrival` = orders where week = (SELECT MAX(no)+2 FROM period)";
    }
    $stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$week);
    mysqli_stmt_execute($stmt); 
}*/