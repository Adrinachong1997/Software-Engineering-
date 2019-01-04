<?php
    require("dbconfig.php");
    //抓取遊戲結束時 各隊伍的總成本
    $sql = "SELECT tname,totalcost FROM `tgame` ORDER BY totalcost ASC";
    $stmt = mysqli_prepare($db, $sql );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    while ($rs = mysqli_fetch_assoc($result)) {
        echo "<tr><td><br/>" , $rs['tname'] ," ",
	        "</td><td>" , $rs['totalcost'];
    }
?>