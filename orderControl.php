<?php
require_once("orderModel.php");
require_once("playerModel.php");
$order = $_POST["order"];
$week = $_POST["week"];
$sumbit = (int)$_POST["sumbit"];
switch($order){
    case "update":
        updateOrder($sumbit,$orders);
        break;
    case "updateweek":
        updateweek($sumbit,$week);
}
header("Location: retailer.php");
 
?>

