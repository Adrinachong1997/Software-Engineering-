<?php
require("orderModel.php");
header("Content-Type: text/event-stream");
header('Cache-Control: no-cache');
$test = $_GET['player'];
while(true) {
    echo "data: " . getAccCost($test) . "\n\n";
    // echo "data: " . $test . "\n\n";
	flush();
}
?>