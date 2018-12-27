<?php
require("dbconfig.php");
require("userModel.php");
$userName = $_POST['id'];
$passWord = $_POST['pwd'];
$Email = $_POST['mail'];
if(id_check($userName)==0){
    echo '帳號重複，請在註冊一次';
	echo '<meta http-equiv=REFRESH CONTENT=2;url=enroll.html>';
}else{
    pic_upload($userName);
$sql = "INSERT INTO user (id, password, mail) VALUES(?, ?, ?)"; 
$stmt = mysqli_prepare($db, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $userName, $passWord, $Email);	// 較安全的寫法 s:表示字串型態 對應後面的參數($id, $pwd)
        mysqli_stmt_execute($stmt); //執行SQL

   //重新導向回到主畫面
   header("Location:loginView.php");
}
?>