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
					//加入隊伍
					require("gameModel.php");
                    updateTeam();
                    gameStart();
				?>
                <tr>
                    <td colspan="2"><img src="../newBG/image/1.gif" width="200" height="200"/></br>等待遊戲開始，請耐心等待。</td>
                </tr>
			</form>
		</table>
	</body>
</html>