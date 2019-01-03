<?php
	require("dbconfig.php");
	$serno=(int)$_GET['serno'];
	if ($serno) {
		$sql = "delete from tgame where serno=?;";
		$stmt = mysqli_prepare($db, $sql );
		mysqli_stmt_bind_param($stmt, "i", $serno);
		mysqli_stmt_execute($stmt);
	}
	header('Location: adminTeamList.php');
?>