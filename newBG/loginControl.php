<?php
    session_start();
    require('dbconfig.php');
    require("userModel.php");
    $userName = $_POST['id'];
    $passWord = $_POST['pwd'];
    $admin = $_SESSION['admin'];


    
    $sql = "select * from user;";
    $stmt = mysqli_prepare($db, $sql );
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt); 
    $rs = mysqli_fetch_assoc($result);

    if (login($userName,$passWord)==1) {
        header("Location:teamList.php" );//初始遊戲畫面
        if (checkAdmin($userName,$passWord)==1){
            header("Location:adminTeamList.php" );
        }
    } 
    else {
        echo "<script>alert('帳號或密碼錯誤')</script>";
        header("Location: loginView.php");
        
    }
?>