<?php
require("userModel.php");
$userName = $_POST['id'];
$passWord = $_POST['pwd'];
if (login($userName,$passWord)==1) {
    header("Location:gameView.php" );//初始遊戲畫面
} else {
    header("Location: loginView.php");
}
?>