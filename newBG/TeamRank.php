<?php
//tgame.go =1 表示配對成功進入遊戲的隊伍;遊戲結束後應記為-1;另外遊戲開始後應將go=0的隊伍從資料庫中刪除
//列出所有隊伍及各自總成本
function showTotalcost() 
{
    global $db;
    $sql = "SELECT tname,totalcost,rank FROM `tgame`  ORDER BY totalcost ASC";//WHERE tgame.go=1
    $stmt = mysqli_prepare($db, $sql);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return $result;
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

    require("dbconfig.php");
    
    $score=0;//獎勵積分&rank
    $result=showTotalcost();
    //先計算隊伍排名
    while ($rs = mysqli_fetch_assoc($result)) {
        $score++;
        setRank($score,$rs['tname']);
        //測試用
        /*echo "<tr><td><br/>" , $rs['tname'] ," ",
            "</td><td>" , $rs['totalcost'];

        $result2=checkMember($rs['tname']);
        while($rs2= mysqli_fetch_assoc($result2)){
            echo "<tr><td><br/>" , $rs2['r1'] ," ",
                 "<tr><td><br/>" , $rs2['r2'] ," ",
                 "<tr><td><br/>" , $rs2['r3'] ," ",
                 "<tr><td><br/>" , $rs2['r4'] ," ",
                 "</td><td>";
        }*/
    }
    //echo "<br/>",$score;

    //再依排名為各隊玩家加分
    $result3=showTotalcost();
    $score=$score+1;
    while ($rs3 = mysqli_fetch_assoc($result3)) {
        $score--;
        /*echo "<tr><td><br/>" , $rs3['tname'] ," ",
            "</td><td>" , $rs3['totalcost'];*/
        $result4=checkMember($rs3['tname']);
        while($rs4= mysqli_fetch_assoc($result4)){
            addscore($rs4['r1'],$score);
            addscore($rs4['r2'],$score);
            addscore($rs4['r3'],$score);
            addscore($rs4['r4'],$score);
            /*echo "<tr><td><br/>" , $rs4['r1'] ," ",
                 "<tr><td><br/>" , $rs4['r2'] ," ",
                 "<tr><td><br/>" , $rs4['r3'] ," ",
                 "<tr><td><br/>" , $rs4['r4'] ," ",
                 "</td><td>";*/
        }
    }
    //echo "<br/>",$score;//測試用
?>