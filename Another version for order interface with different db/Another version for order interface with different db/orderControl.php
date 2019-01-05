<?php
    //error_reporting(E_ERROR | E_PARSE);
    require_once("orderModel.php");
    require_once("playerModel.php");
    $pname = array(
    '1' => "factory.php",
    '2' => "Distributer.php",
    '3' => "wholesaler.php",
    '4' => "retailer.php");
    $tname = (int)$_POST["tname"];
    $pid = (int)$_POST["pid"];
    $operation = $_POST["operation"];
    $order = (int)$_POST["order"];
    $currWeek = (int)$_REQUEST["week"];
    switch($operation){
    /*case "reset":
    r_period();
    r_playerrecord($tname);
    r_status($tname,$currWeek);
    break;*/
    case "update":
    insertOrder($tname,$pid,$order,$currWeek); // insert into 資料庫
    //getCurrentDemand($pid,$currWeek);
    updateStatus($tname,$pid); // 回傳狀態(是否已下單)
    waitStatus($tname,$currWeek); // 確認四個角色都下單(否則轉向等待畫面(未完成) 是則重整頁面)
    break;
}
if($pid != ''){
    header("Location: ".$pname[$pid]);
} else {
    echo '<script>javascript:history.go(-1)</script>';
}

?>
