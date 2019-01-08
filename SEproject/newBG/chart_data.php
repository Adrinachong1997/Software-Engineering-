<?php
//取出每week的各組成本資料
header('Content-Type: application/json');

require_once("dbconfig.php");
require_once("userModel.php");
$uid=getCurrentUser();
$tname=$_SESSION['tname'];//get_tname($uid);

    $sql = " SELECT pid,week,cost from player_record where tname=? ORDER BY week ASC,pid ASC ";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $tname);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    
    
   $data = array();
foreach ($result as $row) {
	$data[] = $row;
}
 print json_encode($data);
?>