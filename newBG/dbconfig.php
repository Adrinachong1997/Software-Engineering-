<?php
    session_start();
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = 'test1';
    $db = mysqli_connect($host, $user, $pass, $dbName) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
    mysqli_query($db,"SET NAMES utf8"); //選擇編碼

    function checkLogin() {
        //echo $_SESSION["uID"];
        
        if ( ! isset($_SESSION["id"]) or $_SESSION["id"]=='') {
                header("Location:loginView.php");
        }
    }
?>
