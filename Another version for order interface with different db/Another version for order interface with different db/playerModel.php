<?php
require("dbconfig.php");

function getCurrentDemand($pid,$currWeek) 
{
    global $db;
    switch($pid){
        case '4':
            $sql = "SELECT demand FROM gamecycle WHERE week=$currWeek";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
        case '3':
            $sql = "SELECT ordered AS demand FROM test WHERE pid=3 AND week = $currWeek";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
        case '2':
            $sql = "SELECT ordered AS demand FROM test WHERE pid=2 AND week = $currWeek";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
        case '1':
            $sql = "SELECT ordered AS demand FROM test WHERE pid=1 AND week = $currWeek";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
    }
    
    return $result;
}
?>