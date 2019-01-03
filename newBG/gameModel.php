<?php
require_once("dbconfig.php");

function ftyUpdate() {
        global $db;
        $setno=$_POST['setno'];
        $sqlData=0;
        //把50期需求存入資料庫
        if ($db) {echo'<table id="main" method="post" >',
            '<tr><td colspan="2">',
                '<font size="6">資料已新增</font>',
            '</td></tr>';
            
            for($i = 0 ; $i < 50 ; $i++) {
                $sqlData = $setno[$i];
                $no = $i + 1;
                $sql = "insert into gamecycle (no, setno) values (?,?)";
                $stmt = mysqli_prepare($db, $sql); //prepare sql statement
                mysqli_stmt_bind_param($stmt, "ii", $no, $sqlData); //bind parameters with variables
                mysqli_stmt_execute($stmt);  //執行SQL
            }
        } else {
            echo 'empty title, cannot insert.';
        }
}

function ftyDelete(){
    global $db;
	$sql = "delete from gamecycle where setno";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "i", $setno);
	mysqli_stmt_execute($stmt);
	header('Location: 50thSetting.php');
}

function showTeam(){
    global $db;
    $sql = "select * from tgame;";
    $stmt = mysqli_prepare($db, $sql );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    while (	$rs = mysqli_fetch_assoc($result)) {    
        echo"<tr><td>" , $rs['tname'] ,
            "</td><td>";
            if($rs['r1']!=NULL) {
                echo "<input type='button' disabled='disabled' value='已被選'>";
            }else {
                echo "<input name='role' type='radio' id='role' value='1;" . $rs['tname'] . "' >";
            }
            echo "</td><td>";
            if($rs['r2']!=NULL) {
                echo "<input type='button' disabled='disabled' value='已被選'>";
            }else {
                echo "<input name='role' type='radio' id='role' value='2;" . $rs['tname'] . "' >";
            }
            echo "</td><td>";
            if($rs['r3']!=NULL) {
                echo "<input type='button' disabled='disabled' value='已被選'>";
            }else {
                echo "<input name='role' type='radio' id='role' value='3;" . $rs['tname'] . "' >";
            }
            echo "</td><td>";
            if($rs['r4']!=NULL) {
                echo "<input type='button' disabled='disabled' value='已被選'>";
            }else {
                echo "<input name='role' type='radio' id='role' value='4;" . $rs['tname'] . "' >";
            }     
        "</td></tr>";
    }
}

function adminShowTeam(){
    global $db;
    $sql = "select * from tgame;";
    $stmt = mysqli_prepare($db, $sql );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    while (	$rs = mysqli_fetch_assoc($result)) {
        echo"<tr><td>" , $rs['tname'] ,
            "</td><td>";
            if($rs['r1']!=NULL) {
                echo "<input type='button' disabled='disabled' value='已被選'>";
            }else {
                echo "<input type='button' disabled='disabled' value='未被選'>";
            }
            echo "</td><td>";
            if($rs['r2']!=NULL) {
                echo "<input type='button' disabled='disabled' value='已被選'>";
            }else {
                echo "<input type='button' disabled='disabled' value='未被選'>";
            }
            echo "</td><td>";
            if($rs['r3']!=NULL) {
                echo "<input type='button' disabled='disabled' value='已被選'>";
            }else {
                echo "<input type='button' disabled='disabled' value='未被選'>";
            }
            echo "</td><td>";
            if($rs['r4']!=NULL) {
                echo "<input type='button' disabled='disabled' value='已被選'>";
            }else {
                echo "<input type='button' disabled='disabled' value='未被選'>";
            }
            echo "</td><td>";
            $serno=$rs['serno'];
            echo "<a id='button' href='roomDelete.php?serno=$serno'>刪除</a>";
            echo "</td></tr>";
    }
}

function createTeam(){   
    require("userModel.php");
    //header('refresh: 5;url=""');
    $id = getCurrentUser();
    global $db;
    $role=$_POST['role'];
    $tname=$_POST['tname'];
    if ($tname) {
        $sql1 = "insert into tgame (tname,r$role) values (?,?);";
        $stmt1 = mysqli_prepare($db, $sql1); 
        mysqli_stmt_bind_param($stmt1, "ss",$tname,$id); 
        mysqli_stmt_execute($stmt1);  
        echo "room added.";
    } else {
        echo "empty title, cannot insert.";
    }
}

function updateTeam(){
    global $db;
    require('userModel.php');  
    $id=getCurrentUser();
    $role = $_POST['role'];
    $_SESSION['role'] = $_POST['role'];   
    $uid = $id ;//$rs['id'];
    $str_sec = explode(";",$_SESSION['role']);       
    echo '<tr><td colspan="2" id="background"><font size="6">成功加入隊伍</font></td>',
        "</tr><tr><td>",
        "隊伍名稱</td><td>$str_sec[1]</td></tr>",
    print_r($str_sec);
    if ($str_sec[0] == 1) {
        echo '<tr><td>角色</td><td>工廠</td></tr>';
        $sql = "update tgame set r1 = ? where tname = ? ";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt); 
    } 
    else if ($str_sec[0] == 2) {
        echo '<tr><td>角色</td><td>大盤商</td></tr>';
        $sql = "update tgame set r2 = ? where tname = ? ";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt);  
    } 
    else if($str_sec[0] == 3) {
        echo '<tr><td>角色</td><td>批發商</td></tr>';
        $sql = "update tgame set r3 = ? where tname = ? ";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt);     
    } 
    else if ($str_sec[0] == 4) {	
        echo '<tr><td>角色</td><td>零售商</td></tr>';
        $sql = "update tgame set r4 = ? where tname = ? ";
        $stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
        mysqli_stmt_execute($stmt); //執行SQL
        $result = mysqli_stmt_get_result($stmt);      
    } 
    else {
        echo "cannot update!";
    }
}

function roomDelete(){
    global $db;
	$serno=(int)$_GET['serno'];
	if ($serno) {
		$sql = "delete from tgame where serno=?;";
		$stmt = mysqli_prepare($db, $sql );
		mysqli_stmt_bind_param($stmt, "i", $serno);
		mysqli_stmt_execute($stmt);
	}
	header('Location: adminTeamList.php');
}
?>