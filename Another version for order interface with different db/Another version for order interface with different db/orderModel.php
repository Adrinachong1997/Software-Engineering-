<?php
require("dbconfig.php");
function updateStatus($tname,$pid){ //角色狀態(player_ordered)設為1(已下單)
    global $db;
    if ($pid == 1) 
        $sql = "UPDATE player_ordered SET `p1` = 1 where tname=$tname";
    else if ($pid == 2)
        $sql = "UPDATE player_ordered SET `p2` = 1 where tname=$tname";
    else if ($pid == 3)
        $sql = "UPDATE player_ordered SET `p3` = 1 where tname=$tname";
    else if ($pid == 4)
        $sql = "UPDATE player_ordered SET `p4` = 1 where tname=$tname";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt); //執行SQL
}
function waitStatus($tname,$currWeek){ //等待四個角色狀態(player_ordered)皆為1(已下單) 更新周次(week_changed)+1 更新狀態(player_ordered)為0(未下單)
    global $db;
    $sql = "select p1,p2,p3,p4 from player_ordered where tname = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s", $tname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $rs = mysqli_fetch_assoc($result);
    if ($rs['p1']!= 0&&$rs['p2']!= 0&&$rs['p3']!= 0&&$rs['p4']!= 0){
        global $db;
        $sql = "UPDATE player_ordered SET p1=0,p2=0,p3=0,p4=0 where tname=$tname";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_execute($stmt); //執行SQL
        $sql = "UPDATE week_changed SET `week` = (week+1) where tname=$tname";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_execute($stmt); //執行SQL
    }
}

function countOrder($tname,$pid){ // 取得當週週次o
    global $db;
    $sql = "SELECT week FROM week_changed WHERE tname = $tname";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['week'];
}

function checkStock($tname,$pid,$currWeek) // 取得原始累計庫存o
{
    global $db;
    $lastWeek = $currWeek-1;
    $sql = "select stock from test where pid = ? and tname = ? and week = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "isi", $pid,$tname,$lastWeek);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['stock'];
}
function checkInStock($tname,$pid,$currWeek) // 取得原始累計庫存+今期進貨=今期原始庫存o
{
    global $db;
    $lastWeek = $currWeek-1;
    $lastStock = checkStock($tname,$pid,$currWeek);
    $sql = "select (?+readyin)as stock from test where pid = ? and tname = ? and week = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iisi", $lastStock,$pid,$tname,$lastWeek);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['stock'];
}

function getNewStock($tname,$pid,$currWeek) // 取得今期最終庫存o
{
    global $db;
    $lastWeek = $currWeek-1;
    $original_stock = checkInStock($tname,$pid,$currWeek);
    $sql = "select (?-ordered)as stock from test where pid = ? and tname = ? and week = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "iisi", $original_stock,$pid,$tname,$lastWeek);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['stock'];
}
function getActual_shipment($tname,$pid,$currWeek,$newStock,$oriStock,$inStock,$ordered) // 取得當週實際出貨量o
{
    global $db;
    if($oriStock==0&&$inStock==0) {
        $Actual_shipment = 0;
    }else if($oriStock==0&&$inStock>0&&$newStock==0){
        $Actual_shipment = $ordered;
    }else if($oriStock==0&&$inStock>0&&$newStock<0){
        $Actual_shipment = $ordered-$newStock;
    }else if($oriStock>0&&$inStock>0&&$newStock<=0){
        $Actual_shipment = $inStock;
    }else if($oriStock>0&&$inStock>0&&$newStock>0){
        $Actual_shipment = $ordered;
    }else if($oriStock==0&&$inStock>0&&$newStock>0){
        $Actual_shipment = $ordered;
    }else if($oriStock==0&&$inStock==0&&$newStock<0){
        $Actual_shipment = 0;
    }else if($oriStock<0&&$inStock==0&&$newStock<=0){
        $Actual_shipment = 0;
    }else if($oriStock<0&&$inStock>0&&$newStock>0){
        $Actual_shipment = $ordered;
    }else if($oriStock<0&&$inStock>0&&$newStock<=0){
        $Actual_shipment = $inStock;
    }
    return $Actual_shipment;
}
function getOntheway($tname,$pid,$currWeek) // 取得當週正在進貨路上的訂單o
{
    global $db;
    $lastWeek = $currWeek-1;
    $pidup = $pid-1;
    if($pid==1){
        $sql = "select demand as Ontheway from test where pid = ? and tname = ? and week = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "isi", $pid,$tname,$lastWeek);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt); 
        $rs = mysqli_fetch_assoc($result);
        return $rs['Ontheway'];
    }else{
        $sql = "select actual_shipment as Ontheway from test where pid = ? and tname = ? and week = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "isi", $pidup,$tname,$lastWeek);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt); 
        $rs = mysqli_fetch_assoc($result);
        return $rs['Ontheway'];
    }
}
function getReadyin($tname,$pid,$currWeek) // 取得當週準備於下期進貨的訂單o
{
    global $db;
    $lastWeek = $currWeek-1;
    $sql = "select ontheway as Readyin from test where pid = ? and tname = ? and week = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "isi", $pid,$tname,$lastWeek);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    return $rs['Readyin'];
}
function getOrdered($tname,$pid,$currWeek) // 取得當週下游訂單o
{
    global $db;
    if ($pid == 4) {
        $sql = "select demand from gamecycle where week = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "i", $currWeek);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt); 
        $rs = mysqli_fetch_assoc($result);
        return $rs['demand'];
    }else{
        $piddw = $pid+1;
        $lastWeek = $currWeek-1;
        $sql = "select demand from test where pid = ? and tname = ? and week = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "isi", $piddw,$tname,$lastWeek);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt); 
        $rs = mysqli_fetch_assoc($result);
        return $rs['demand'];
    }
}
function getCost($tname,$pid,$order,$currWeek,$newStock)  // 取得當週類計成本o
{
    global $db;
    $piddw = $pid+1;
    $lastWeek = $currWeek-1;
    if ($newStock>0) { //庫存>0 成本*1
        $piddw = $pid+1;
        $lastWeek = $currWeek-1;
        $sql = "select (cost+?*1) as Cost from test where pid = ? and tname = ? and week = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "iisi", $newStock,$pid,$tname,$currWeek);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt); 
        $rs = mysqli_fetch_assoc($result);
        return $rs['Cost'];
    } else if ($newStock<0) { //庫存<0 成本*2
        $piddw = $pid+1;
        $lastWeek = $currWeek-1;
        $sql = "select (cost+?*2) as Cost from test where pid = ? and tname = ? and week = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "iisi", $newStock,$pid,$tname,$currWeek);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt); 
        $rs = mysqli_fetch_assoc($result);
        return $rs['Cost'];
    } else if ($newStock==0) { //庫存=0 成本不變
        $piddw = $pid+1;
        $lastWeek = $currWeek-1;
        $sql = "select cost as Cost from test where pid = ? and tname = ? and week = ?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "isi", $pid,$tname,$currWeek);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt); 
        $rs = mysqli_fetch_assoc($result);
        return $rs['Cost'];
    }
}
function checkOrder($tname,$pid)  // 確認該角色是否已下單回傳狀態o
{
    global $db;
    $sql = "select p1,p2,p3,p4 from player_ordered where tname = ?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s",$tname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);
    if ($pid = 1){
        return $rs['p1'];
    } else if($pid = 2){
        return $rs['p2'];
    } else if($pid = 3){
        return $rs['p3'];
    } else if($pid = 4){
        return $rs['p4'];
    }
}
function insertOrder($tname,$pid,$order,$currWeek){ //由狀態確認該角色是否已下單
    if(checkOrder($tname,$pid)==1) //$pid==?已下單
        // 提示請等待其他角色下單
        echo "<meta http-equiv='refresh' content='1;url=<?php echo $url;?>'>";
    else
        // insert.update當週訂單
        insertInOrder($tname,$pid,$order,$currWeek);
}

function insertInOrder($tname,$pid,$order,$currWeek){ //insert當周訂單
    global $db;
    if ($currWeek > 1){ 
    //第一週後 
    //if該上游角色已下單update該筆訂單訂貨量至上游之下游訂單 
    //if該上游角色未下單insert該筆訂單訂貨量至上游之下游訂單 
    //if該角色訂單已存在update當期訂貨量 else insert當週訂單
        $ordered = getOrdered($tname,$pid,$currWeek); // 取得當週下游訂單o
        $oriStock = checkStock($tname,$pid,$currWeek); // 取得原始累計庫存o
        $inStock = checkInStock($tname,$pid,$currWeek); // 取得原始累計庫存+今期進貨=今期原始庫存o
        $newStock = getNewStock($tname,$pid,$order,$currWeek);// 取得今期最終庫存o
        $actual_shipment = getActual_shipment($tname,$pid,$currWeek,$newStock,$oriStock,$inStock,$ordered); // 取得當週實際出貨量o
        $ontheway = getOntheway($tname,$pid,$currWeek);// 取得當週正在進貨路上的訂單o
        $readyin = getReadyin($tname,$pid,$currWeek); // 取得當週準備於下期進貨的訂單o
        $cost = getCost($tname,$pid,$order,$currWeek,$stock,$outofstock);// 取得當週類計成本o
        $sql = "insert into `test` 
        (tname,pid,week,demand,ontheway,ordered,readyin)  
        values (?,?,?,?,?,?,?)";
        $stmt = mysqli_prepare($db, $sql); // $actual_shipment,$cost 尚未加入
        mysqli_stmt_bind_param($stmt, "siiiiii", $tname,$pid,$currWeek,$order,$ontheway,$ordered,$readyin);
        mysqli_stmt_execute($stmt);
        $sql = "update `test` set ordered=? where tname=? and pid=?-1 and week=?";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "isii", $order,$tname,$pid,$currWeek);
        mysqli_stmt_execute($stmt);
    } else if($currWeek==1){ // 當week==1 下單後覆蓋第一週訂單
        $pidup = $pid-1;
        $ordered = getOrdered($tname,$pid,$currWeek); // 取得當週下游訂單o
        $sql = "update `test` set demand=?,week=1 where tname=? and pid=? "; //更新當期下單(第一期)
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "isi", $order,$tname,$pid);
        mysqli_stmt_execute($stmt);
        if($pid ==4){ //零售商取得訂單自消費者
            $sql = "update `test` set ordered=? where tname=? and pid=4 ";  //更新當期下游訂單(第一期)當下游是消費者時
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_bind_param($stmt, "is",$ordered,$tname);
            mysqli_stmt_execute($stmt);
        }
        $sql = "update `test` set ordered=?,week=1 where tname=? and pid=? "; //更新當期下單(第一期)至上游
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "isi", $order,$tname,$pidup);
        mysqli_stmt_execute($stmt);
    }
}

function getOrderList($tname,$pid) // 取得訂單
{
    global $db;
    $sql = "SELECT * FROM test WHERE pid=? AND tname =?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "ii", $pid, $tname);
    mysqli_stmt_execute($stmt); //執行SQL
    $result = mysqli_stmt_get_result($stmt); 
    return $result;
}

?>