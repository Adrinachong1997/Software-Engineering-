<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>配隊成功！</title>
        <style type="text/css">
		</style>
		<meta http-equiv="refresh" content="5">
    </head>
    <body>
		<table id="main">
            <form id="team" method="post" accept-charset="utf-8">
				<?php
                require('dbconfig.php');
                require('userModel.php');

                $id=getCurrentUser();
                if (isset($_POST['role'])){
					$role = $_POST['role'];
					$_SESSION['role'] = $_POST['role'];
				}
				$uid = $id ;//$rs['id'];
				$str_sec = explode(";",$_SESSION['role']);

				echo '<tr><td colspan="2" id="background"><font size="6">成功加入隊伍</font></td>',
					"</tr><tr><td>",
                "隊伍名稱</td><td>$str_sec[1]</td></tr>",

				print_r($str_sec);

				if ($str_sec[0] == 1) {
                    echo '<tr><td>角色</td><td>工廠</td></tr>';
					$sql = "update tgame set r1 = ? where tname = ? ";
					$stmt = mysqli_prepare($db, $sql);
					mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
                    mysqli_stmt_execute($stmt); //執行SQL
                    $result = mysqli_stmt_get_result($stmt);

				}
				else if ($str_sec[0] == 2) {
                    echo '<tr><td>角色</td><td>大盤商</td></tr>';
					$sql = "update tgame set r2 = ? where tname = ? ";
					$stmt = mysqli_prepare($db, $sql);
					mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
					mysqli_stmt_execute($stmt); //執行SQL
                    $result = mysqli_stmt_get_result($stmt);

				}
				else if($str_sec[0] == 3) {
                    echo '<tr><td>角色</td><td>批發商</td></tr>';
					$sql = "update tgame set r3 = ? where tname = ? ";
					$stmt = mysqli_prepare($db, $sql);
					mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
					mysqli_stmt_execute($stmt); //執行SQL
                    $result = mysqli_stmt_get_result($stmt);

				}
				else if ($str_sec[0] == 4) {
                    echo '<tr><td>角色</td><td>零售商</td></tr>';
					$sql = "update tgame set r4 = ? where tname = ? ";
					$stmt = mysqli_prepare($db, $sql);
					mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
					mysqli_stmt_execute($stmt); //執行SQL
                    $result = mysqli_stmt_get_result($stmt);

				}
				else {
					echo "cannot update!";
				}
				?>
                <tr>
                    <td colspan="2"><img src="1.gif" width="200" height="200"/></br>等待遊戲開始</td>
                </tr>
			</form>
		</table>
	</body>
</html>