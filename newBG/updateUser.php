<!DOCTYPE html>
	<html>
		<head>
			<link rel="stylesheet" type="text/css" href="style.css" />
			<meta charset="UTF-8"/>
			<title>更新資料成功</title>
			<style type="text/css">
			#main {
            width: 500px;
            margin: 150px auto;
			}
			table {
				width: 300px;
				height: 150px;
			}
			</style>
			<script type="text/javascript">
			</script>
		</head>
		<body>
        <table id="main">
            <form id="team" method="post" action="loginControl.php">
                <tr>
                    <td id="background"><font size="6">更新資料成功</font></td>
                </tr>
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
					//echo "data updated";
				} else echo "wrong.";
				?>
				<tr>
					<td>
						<a id="button" onclick="history.go(-2)">回遊戲大廳</a>
					</td>
				</tr>
			</form>
		</table>
	</body>
</html>