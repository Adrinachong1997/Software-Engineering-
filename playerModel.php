<?php
require("dbconfig.php");
function updateweek() 
{
    if($no>0){
    global $db;
    $sql = " UPDATE `period` SET `no` = no+1 where id = 1";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$id);
    mysqli_stmt_execute($stmt); 
    return ;
    }
}
function weeklist() 
{
    global $db;
    $sql = "select * from period ";
    $stmt = mysqli_prepare($db, $sql);
    //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result;
}
function r_period()
{
    global $db;
    $sql = "TRUNCATE TABLE period";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt); 
    $sql = "INSERT INTO period(`id`,`no`) values (1,0);";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	return;
}