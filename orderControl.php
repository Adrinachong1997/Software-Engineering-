<?php
require_once("orderModel.php");
require_once("playerModel.php");
$order = $_POST["order"];
$sumbit = (int)$_POST["sumbit"];
$no=(int)$_REQUEST["no"];
switch($order){
    case "reset":
        r_playerrecord();
        r_period();
        break;
    case "update":
        updateOrder($sumbit,$orders);
        break;
    case "updateweek":
    updateweek();
    break;
}
header("Location: retailer.php");
?>
