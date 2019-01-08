<?php
    require_once("dbconfig.php");  
    require_once("userModel.php");  
    $id=$_SESSION['id'];
    $result=showHistory($id);
    echo "玩家參與紀錄<br/>";
    while ($rs = mysqli_fetch_assoc($result)){
        echo $rs['tname']," ",$rs['r1']," ",$rs['r2']," ",$rs['r3']," ",$rs['r4']," ",$rs['totalcost'];
        echo '<br/>';
    }
    //返回按鈕
?>