<?php 
require("TeamRank");
    $result=showTotalcost();
    $rnak=0;
    while($rs = mysqli_fetch_assoc($result)){
        $rank++;
        echo $rank;
        echo $rs['tname'];
        echo $rs['r1'];
        echo $rs['r2'];
        echo $rs['r3'];
        echo $rs['r4'];
        echo $rs['totalcost'];
    }

?>

