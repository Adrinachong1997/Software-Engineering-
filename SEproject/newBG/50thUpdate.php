<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>五十期資料設定</title>
        <style type="text/css">
        #main {
            width: 500px;
            margin: 160px auto;
        }
        table {
            width: 500px;
            height: 50px;
        }
        </style>
    </head>
	<body>
        <!--返回的按鈕 -->
        <table id="main">
            <form id="demand" method="post"  accept-charset="utf-8">
                <?php
                require('dbconfig.php');
                require('gameModel.php');
                //把50期需求存入資料庫
                ftyUpdate();
                ?>	
            </form>
        </table>
	</body>
</html>

