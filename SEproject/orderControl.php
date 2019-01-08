<?php
error_reporting(E_ERROR | E_PARSE);
require_once("orderModel.php");
require_once("playerModel.php");
$pname = array(
    '1' => "factory.php",
    '2' => "Distributer.php",
    '3' => "wholesaler.php",
    '4' => "retailer.php");
$tname = $_POST["tname"];
$pid = (int)$_POST["pid"];
$order = (int)$_POST["order"];
$week = (int)$_REQUEST["week"]; //REQUEST = GET or POST, POST = only POST, GET = only GET
$operation = $_POST["operation"];
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
