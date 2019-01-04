<?php
error_reporting(E_ERROR | E_PARSE);
require_once("orderModel.php");
require_once("playerModel.php");
$pname = array(
    '1' => "factory.php",
    '2' => "Distributer.php",
    '3' => "wholesaler.php",
    '4' => "retailer.php");
$tname = (int)$_POST["tname"];
$pid = (int)$_POST["pid"];
$operation = $_POST["operation"];
$order = (int)$_POST["order"];
$week = (int)$_REQUEST["week"];
switch($operation){
    case "reset":
        r_period();
        r_playerrecord($tname);
        r_status($tname,$week);
        break;
    case "update":
        updatePeriod($week);
        insertOrder($tname,$pid,$order,$week);
        getCurrentDemand($pid,$week);
        updateStatus($tname,$order,$pid,$week);
        updataWeek($order,$tname,$week,$pid);
        break;
    
}
if($pid != ''){
    header("Location: ".$pname[$pid]);
} else {
    echo '<script>javascript:history.go(-1)</script>';
}

?>
