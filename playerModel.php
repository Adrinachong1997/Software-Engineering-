<?php
require("dbconfig.php");
function updatePeriod() 
{
    global $db;
    $sql = " UPDATE `period` SET `week` = week+1 where id = 1";
	$stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt); 
}
function getCurrentPeriod() 
{
    global $db;
    $sql = "select * from period";
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
    $sql = "INSERT INTO period(`id`,`week`) values (1,0);";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_execute($stmt); 
	return;
}
function getCurrentDemand($pid,$currWeek) 
{
    global $db;
    switch($pid){
        case '4':
            $sql = "SELECT demand FROM gamecycle WHERE week=(SELECT MAX(week) FROM period) ";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
        case '3':
            $sql = "SELECT orders AS demand FROM player_record WHERE pid=4 AND week = $currWeek";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
        case '2':
            $sql = "SELECT orders AS demand FROM player_record WHERE pid=3 AND week = $currWeek";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
        case '1':
            $sql = "SELECT orders AS demand FROM player_record WHERE pid=2 AND week = $currWeek";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
    }
    
    return $result;
}