<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>無標題文件</title>
</head>
<body>
<p>更新留言</p>
<hr />
<?php
require("dbconfig.php");
$r1=$_POST['r1'];
$r2=$_POST['r2'];
$r3=$_POST['r3'];
$r4=$_POST['r4'];

if ($r1) {
	$sql = "update tgame set r1==1";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "s",$r1);
	mysqli_stmt_execute($stmt); //執行SQL
	echo "留言已更新";
	echo "</br><a href='test.php'>返回</a>";
} else echo "錯誤";
if ($r2) {
	$sql = "update tgame set r2==1";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "s",$r2);
	mysqli_stmt_execute($stmt); //執行SQL
	echo "留言已更新";
	echo "</br><a href='test.php'>返回</a>";
} else echo "錯誤";
if ($r3) {
	$sql = "update tgame set r3==1";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "s",$r3);
	mysqli_stmt_execute($stmt); //執行SQL
	echo "留言已更新";
	echo "</br><a href='test.php'>返回</a>";
} else echo "錯誤";
if ($r4) {
	$sql = "update tgame set r4==1";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "s",$r4);
	mysqli_stmt_execute($stmt); //執行SQL
	echo "留言已更新";
	echo "</br><a href='test.php'>返回</a>";
} else echo "錯誤";
?>
</body>
</html>