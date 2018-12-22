<?php
session_start();

$host = 'localhost';
$user = '1071SE';
$pass = '1234';
$dbName = '1071se_beer';
$db = mysqli_connect($host, $user, $pass, $dbName) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
mysqli_query($db,"SET NAMES utf8"); //選擇編碼

function checkLogin() {
    //echo $_SESSION["uID"];
	if ( ! isset($_SESSION["uID"]) or $_SESSION["uID"] <= 0) {
            header("Location: login.php");
	}
}
?>