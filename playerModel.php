<?php
require("dbconfig.php");
function updateweek($sumbit,$week) 
{
    global $db;
    $sql = "UPDATE `period` SET `week` = ? period.id = 1";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "i",$sumbit);
    mysqli_stmt_execute($stmt); 
	return ;
    
    /*if(isset($_POST['submit'])){
        $sql = "select * from period where week";
        $stmt = mysqli_prepare($db, $sql);
        //mysqli_stmt_bind_param($stmt, "ss", $id, $pwd);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
    }*/
}