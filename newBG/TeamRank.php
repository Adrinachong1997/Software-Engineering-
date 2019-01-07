<?php
//tgame.go =1 表示配對成功進入遊戲的隊伍;遊戲結束後應記為-1;另外遊戲開始後應將go=0的隊伍從資料庫中刪除
    require("dbconfig.php");  
    $score=5;//獎勵積分+1           
    /*
    //排名模式: 團隊排行

    $score=0;                                    //獎勵積分&rank
    $result=showTotalcost();
    先計算隊伍排名
    while ($rs = mysqli_fetch_assoc($result)) {
        $score++;
        setRank($score,$rs['tname']);
    }

    $result3=showTotalcost();
    $score=$score+1;
    while ($rs3 = mysqli_fetch_assoc($result3)) {
        $score--;
        $result4=checkMember($rs3['tname']);
        while($rs4= mysqli_fetch_assoc($result4)){
            addscore($rs4['r1'],$score);
            addscore($rs4['r2'],$score);
            addscore($rs4['r3'],$score);
            addscore($rs4['r4'],$score);
        }
    }*/

    //排名模式: 隊內排行
    $tname=_SESSION['tname'];
    //$week=
    $totalcost=0;
    $result=showMemberCost($tname,5);
    while ($rs = mysqli_fetch_assoc($result)) {
        $totalcost+=$rs['acc_cost'];
        $pid=$rs['pid'];
        $score--;
        $result2=checkMember($tname);//tname
        while ($rs2 = mysqli_fetch_assoc($result2)){
            
            if($pid==1)
                addscore($rs2['r1'],$score);
            if($pid==2)
                addscore($rs2['r2'],$score);
            if($pid==3)
                addscore($rs2['r3'],$score);
            if($pid==4)
                addscore($rs2['r4'],$score);
        }
    }
    setTotalcost($totalcost,$tname);
function showMemberCost($tname,$week)
{
    global $db;
    $sql="SELECT tname,pid,acc_cost FROM `player_record` WHERE week=? AND tname=? ORDER BY acc_cost ASC";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "is",$week,$tname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
//列出所有隊伍及各自總成本
function showTotalcost() 
{
    global $db;
    $sql = "SELECT tname,r1,r2,r3,r4,totalcost,rank FROM `tgame`  ORDER BY totalcost ASC";//WHERE tgame.go=1
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}
//將隊伍總成本記錄到tgame中
function setTotalcost($totalcost,$tname){
    global $db;
    $sql="update tgame set totalcost=? From `tgame` WHERE tname=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "is",$totalcost,$tname);
    mysqli_stmt_execute($stmt);
    return;
}
//設定隊伍名次
function setRank($score,$tname)
{
    global $db;
    $sql = "update tgame set rank=? where tname=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "is", $score,$tname);
    mysqli_stmt_execute($stmt);
    return;
}

//檢查隊伍成員
function checkMember($tname)
{
    global $db;
    $sql = "SELECT tname,r1,r2,r3,r4 FROM `tgame` where tname=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "s",$tname);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
}

//結算積分
function addscore($id,$score){
    global $db;
    $sql="update user set score=score+? where id=?";
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_bind_param($stmt, "is", $score,$id);
    mysqli_stmt_execute($stmt);
    return;
}
?>