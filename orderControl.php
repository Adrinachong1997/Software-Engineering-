<?php
require_once("orderModel.php");
require_once("playerModel.php");
$operation = $_POST["operation"];
$order = (int)$_POST["order"];
$no=(int)$_REQUEST["no"];
switch($operation){
    case "reset":
        r_playerrecord();
        r_period();
        break;
    case "update":
        updatePeriod();
        updateOrder($order);
        getCurrentDemand();
        break;
    case "updateweek":
        updateweek();
        break;
}
header("Location: retailer.php");

?>
