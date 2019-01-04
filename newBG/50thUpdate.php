<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>五十期資料設定</title>
        <style type="text/css">
        </style>
    </head>
	<body>
        <?php
            require('dbconfig.php');
            require('gameModel.php');
            //把50期需求存入資料庫
            ftyUpdate();
        ?>	
        <!--返回的按鈕 -->
        <table id="main">
            <form id="demand" method="post"  accept-charset="utf-8">
                <tr><td colspan="2"> 
                    <a id="button" href="adminTeamList.php">返回主頁</a>
                </td></tr>
            </form>
        </table>
	</body>
</html>

