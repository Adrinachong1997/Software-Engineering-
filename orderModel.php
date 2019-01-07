<?php
require("dbconfig.php");
/*---------- UPDATE OR INSERT ----------*/
function updateStatus($tname,$order,$pid,$week){
    global $db;
    switch($pid){
        case '4':
            $sql = "UPDATE 
                        `player_status`
                    SET 
                        p4         = $week
                    WHERE 
                        tname = '$tname'";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
        case '3':
            $sql = "UPDATE 
                        `player_status`
                    SET 
                        p3         = $week
                    WHERE 
                        tname = '$tname'";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
        case '2':
            $sql = "UPDATE 
                        `player_status`
                    SET 
                        p2      = $week
                    WHERE 
                        tname = '$tname'";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
        case '1':
            $sql = "UPDATE 
                        `player_status`
                    SET 
                        p1      = $week
                    WHERE 
                        tname = '$tname'";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt); //執行SQL
            $result = mysqli_stmt_get_result($stmt); 
            break;
    }
    $sql = "UPDATE player_status
    SET `STATUS` =
    (SELECT b.C 
        FROM  (SELECT 
                IF((p4 = week AND p3 = week AND p2 = week AND p1 = week),$week,`status`) C 
                FROM `player_status` 
                WHERE tname = '$tname')`b` 
    WHERE tname='$tname')";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt); //執行SQL
}
function updataWeek($order,$tname,$week,$pid){
    global $db;
    $sql ="UPDATE player_status SET `week` = (SELECT a.c FROM(SELECT IF((`status`=$week) ,$week+1,$week)c FROM player_status WHERE tname='$tname')`a` WHERE tname='$tname')";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    return $result;
}
function insertOrder($tname,$pid,$order,$currWeek){
    global $db;
    
    // echo $actual_shipment= countactual_shipment($tname,$pid,$currWeek);
    $original_stock = "15";
    $expected_arrival = "0";
    $actual_arrival = "0";
        
    
    if($currWeek > 1){
        $original_stock = getOriginalStock($pid,$currWeek);
        if ($currWeek > 2){
            $expected_arrival=countexpected_arrival($pid,$currWeek);
            $actual_arrival=countactual_arrival($pid,$currWeek);
            $original_stock = $original_stock + $actual_arrival;
        }
    }

    $demand = getDemand($pid,$currWeek);
    if((int)$original_stock < 0) {
        $cost = $cost+$original_stock*(-2);
        // echo $cost = "SELECT (cost+original_stock*(-2)) FROM player_record WHERE pid = $pid AND tname = $tname AND week =$currWeek";
    } else {
        $cost = $original_stock;
    }
    $acc_cost = getAccCost($pid,$tname);

    // echo "<h4>original_stock：".$original_stock."</h4>";
    // echo "<h4>int:original_stock：".(int)$original_stock."</h4>";
    // echo "<h4>demand".$demand."</h1>";
    if($original_stock > $demand || $original_stock == $demand) {    //有足夠的貨
        $actual_shipment = $demand;
    } else if ($original_stock > 0 ) {    //有多少給多少//&& $original_stock < $demand
        $actual_shipment = $original_stock;    
    } else {    //沒有貨
        $actual_shipment = 0;
    }
    // echo $actual_shipment;
    if($currWeek == 1){
        echo $sql = "UPDATE 
                    `player_record`
                SET 
                    tname = '$tname',
                    original_stock = ($original_stock),
                    expected_arrival = ($expected_arrival),
                    actual_arrival = ($actual_arrival),
                    orders = ($order),
                    cost = ($original_stock),
                    acc_cost = ($acc_cost),
                    demand = ($demand),
                    actual_shipment = ($actual_shipment),
                    week = ($currWeek)
                WHERE 
                    pid = '$pid'
                    AND tname = '$tname'";
    } else {
        $acc_cost = getAccCost($pid,$tname)+$cost;
       echo $sql = "INSERT INTO `player_record`
                        (tname,pid,week,original_stock,expected_arrival,actual_arrival,orders,cost,acc_cost,demand,actual_shipment)
                    VALUES
                        ('$tname',$pid,$currWeek,($original_stock),($expected_arrival),($actual_arrival),$order,($cost),($acc_cost),($demand),$actual_shipment)";
    }
    echo "第".$currWeek."周，庫存：".$original_stock."到貨情形".$expected_arrival."/".$actual_arrival."訂單：".$order."成本：".$cost."累計成本：".$acc_cost."需求：".$demand."實際出貨".$actual_shipment;
    // echo validateStatus($tname,$currWeek,$pid);
    // echo $sql;
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "iii",$tname,$pid,$order);
    mysqli_stmt_execute($stmt); 
}

/*---------- SELECT ----------*/
function getOriginalStock($pid,$currWeek){
    global $db;
    $sql = "SELECT original_stock - demand AS result FROM `player_record` WHERE pid = $pid AND week = $currWeek - 1";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['result'];
}
function countOrder($tname,$pid){
    global $db;
    $sql = "SELECT week AS result FROM player_status WHERE  tname = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s",$tname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['result'];
    // SELECT (week) AS result FROM player_status WHERE   tname = $tname
}
function validateStatus($tname,$week,$pid){
    global $db;
    $player = 'p'.$pid;
    $sql = "SELECT $player AS result FROM player_status WHERE  tname = ? AND week = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "si",$tname,$week);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['result'];
}
function countexpected_arrival($pid,$currWeek){
    global $db;
    switch ($pid){
        case '4':
            $sql = "SELECT orders FROM player_record WHERE pid=$pid AND week =$currWeek-2";
            break;
        case '3':
            $sql = "SELECT orders FROM player_record WHERE pid=$pid AND week =$currWeek-2";
            break;
        case '2':
            $sql = "SELECT orders FROM player_record WHERE pid=$pid AND week =$currWeek-2";
            break;
        case '1':
            $sql = "SELECT orders FROM player_record WHERE pid=$pid AND week =$currWeek-2";
            break;
    }
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['orders'];
}
function countactual_arrival($pid,$currWeek){
    global $db;
    switch ($pid){
        case '4':
            $sql = "SELECT actual_shipment FROM player_record WHERE pid=($pid-1) AND week =$currWeek-2";
            break;
        case '3':
            $sql = "SELECT actual_shipment FROM player_record WHERE pid=($pid-1) AND week =$currWeek-2";
            break;
        case '2':
            $sql = "SELECT actual_shipment FROM player_record WHERE pid=($pid-1) AND week =$currWeek-2";
            break;
        case '1':
            $sql = "SELECT actual_shipment FROM player_record WHERE pid=($pid) AND week =$currWeek-2";
            break;
    }
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['actual_shipment'];
}
function getAccCost($pid,$tname){
    global $db;
    $sql = "SELECT SUM(cost) AS result FROM player_record WHERE pid= ? AND tname = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "is",$pid,$tname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['result'];
}
function getDemand($pid,$currWeek){
    global $db;
    switch ($pid){
        case '4':
            $sql = "SELECT demand AS result FROM gamecycle WHERE week = $currWeek ";
            break;
        case '3':
            $sql = "SELECT orders AS result FROM player_record WHERE pid=4 AND week = $currWeek";
            break;
        case '2':
            $sql = "SELECT orders AS result FROM player_record WHERE pid=3 AND week = $currWeek";
            break;
        case '1':
            $sql = "SELECT orders AS result FROM player_record WHERE pid=2 AND week = $currWeek";
            break;
    }
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['result'];
}
function getOrderList($tname,$pid) {
    global $db;
    $sql = "SELECT * FROM player_record WHERE pid=? AND tname =?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "is", $pid, $tname);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result;
}

function getTeamAmount(){
    global $db;
    $sql = "SELECT count(*) as result FROM tgame WHERE go='1'";
    $stmt = mysqli_prepare($db, $sql);
    // mysqli_stmt_bind_param($stmt, "ii", $pid, $tname);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['result'];
}
function getTeamName(){
    global $db;
    $arr = array();
    $sql = "SELECT tname as result FROM tgame WHERE go='1'";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "is", $pid, $tname);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt);
    while (	$rs = mysqli_fetch_assoc($result)) {
        array_push($arr,$rs['result']);
    }
    return $arr;
}
/*---------- TRUNCATE AND INSERT ----------*/
function r_status($tname,$week) {
    global $db;
    $sql = "TRUNCATE TABLE player_status";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $team = getTeamAmount(); 
    $arr = getTeamName();
    $tmp = $week+1;
    for($j = 0; $j < $team ; $j++) {
        $sql = "INSERT INTO player_status 
                    (tname,week,p1,p2,p3,p4,`status`)
                VALUES 
                    ('$arr[$j]',?,0,0,0,0,0)";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "i",$tmp);
        mysqli_stmt_execute($stmt); 
    }
}

function r_playerrecord($tname){ //清除playerrecord資料庫
    global $db;
    $sql = "TRUNCATE TABLE player_record";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt); 
    $team = getTeamAmount(); 
    $arr = getTeamName();
    // echo $team;
    for($j = 0; $j < $team ; $j++) {
        for($i = 4; $i > 0; $i--){
            $sql = "INSERT INTO player_record 
                        (tname,pid,week,original_stock,expected_arrival,actual_arrival,orders,cost,acc_cost,demand,actual_shipment)
                    values
                        ('$arr[$j]',($i),0,15,0,0,0,15,15,0,0)";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_execute($stmt);  
        }
    }
}