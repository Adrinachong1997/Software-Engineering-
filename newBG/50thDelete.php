<?php
	require("dbconfig.php");
	$sql = "delete from gamecycle where setno";
	$stmt = mysqli_prepare($db, $sql );
	mysqli_stmt_bind_param($stmt, "i", $setno);
	mysqli_stmt_execute($stmt);
	
	header('Location: 50thSetting.php');
?>