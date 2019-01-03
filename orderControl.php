<?php
error_reporting(E_ERROR | E_PARSE);
require_once("orderModel.php");
require_once("playerModel.php");
$pname = array(
    '1' => "factory.php",
    '2' => "Distributer.php",
    '3' => "wholesaler.php",
    '4' => "retailer.php");
$serno = (int)$_POST["serno"];
$pid = (int)$_POST["pid"];
$operation = $_POST["operation"];
$order = (int)$_POST["order"];
$week = (int)$_REQUEST["week"];
switch($operation){
    case "reset":
        r_period();
        r_playerrecord($serno);
        r_status($serno,$week);
        break;
    case "update":
        updatePeriod();
        insertOrder($serno,$pid,$order,$week);
        getCurrentDemand($pid,$week);
        updateStatus($serno,$order,$pid,$week);
        break;
    
}
if($pid != ''){
    header("Location: ".$pname[$pid]);
} else {
    echo '<script>javascript:history.go(-1)</script>';
}

?>
