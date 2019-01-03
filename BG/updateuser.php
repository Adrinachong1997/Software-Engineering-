<!DOCTYPE html>
<html>
<body>
<p>Update data</p>
<hr />
<?php
require("dbconfig.php");
require("userModel.php");

$id = $_POST["id"];
$password = $_POST['password'];
pic_upload($id);
if ($id> " ") {
	$sql = "update user set password=? where user.id=?";
	$stmt = mysqli_prepare($db, $sql);
	mysqli_stmt_bind_param($stmt, "ss", $password, $id);
	mysqli_stmt_execute($stmt); //執行SQL
	echo "data updated";
} else echo "wrong.";
?>
<a href="gameView.php">回遊戲大廳</a>
</body>
</html>