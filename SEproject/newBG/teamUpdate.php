<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>配隊成功！</title>
        <style type="text/css">
        #main {
            width: 500px;
            margin: 70px auto;
        }
        table {
            width: 500px;
            height: 400px;
        }
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
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr> 
			</form>
		</table>
	</body>
</html>