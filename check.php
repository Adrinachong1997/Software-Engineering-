<?php
require("orderModel.php");
header("Content-Type: text/event-stream");
header('Cache-Control: no-cache');
while(true) {
    echo "data: " . validateStatusState(1,1) . "\n\n";
	flush();
}
?>