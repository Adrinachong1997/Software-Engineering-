<?php
    require("dbconfig.php");
    //抓取遊戲結束時 同一隊伍內各角色的累計成本
    $sql = "SELECT tname,pid,week,acc_cost FROM `player_record` WHERE week%50=0 ORDER BY tname";
    $stmt = mysqli_prepare($db, $sql );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
                
    $totalcost=0;
    //將各角色累積成本加總形成隊伍總成本
    while ($rs = mysqli_fetch_assoc($result)) {
        if($rs['pid']==1){
            $totalcost=0;
        }
        $totalcost+=$rs['acc_cost'];
        //echo "</td><td><br/>" , $totalcost;
        $sql1 = "update tgame set totalcost = ?  where tname = ?";
		$stmt1 = mysqli_prepare($db, $sql1);
		mysqli_stmt_bind_param($stmt1, "is",$totalcost,$rs['tname']);
        mysqli_stmt_execute($stmt1);
    }
?>
