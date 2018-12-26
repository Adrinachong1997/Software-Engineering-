<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $dbName = 'test1';
    $db = mysqli_connect($host, $user, $pass, $dbName) or die('Error with MySQL connection'); //跟MyMSQL連線並登入
    mysqli_query($db,"SET NAMES utf8"); //選擇編碼
?>