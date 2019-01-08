<?php 
    require("dbconfig.php"); 
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="newBG/style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>排行鎊</title>
        <style type="text/css">
        #main {
            width: 900px;
            margin: 60px auto;
        }
        table {
            width: 500px;
            height: 400px;
        }
        </style>
    </head>
    <body>
        <table id="main">
            <form id="team" method="post" action="teamUpdate.php" accept-charset="utf-8">
            <tr>
                <td colspan="7"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                </td>
            </tr>
            <td colspan="7" id="background">
                <img src="newBG/image/rank.png" width="100"/></br>
            <font size="6">排行鎊</font></td>
            <tr>
                <td colspan="7"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                </td>
            </tr>
            <tr>
                <td width="20px">排名</td>
                <td width="20px">隊伍名稱</td>
                <td width="20px">工廠</br>Factory</td>
                <td width="20px">大盤商</br>Distributer</td>
                <td width="20px">批發商</br>Wholesale</td>
                <td width="20px">零售商</br>Retailer</td>
                <td width="20px">總成積</td>
            </tr>
            <?php 
                require("newBG/gameModel.php");
                showCost();
            ?>
            <tr>
                <td colspan="7"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                </td>
            </tr>
            <tr>
                <td colspan="7">
                    <a id="button" href="newBG/teamList.php">返回主頁</a>
                </td>
            <tr>
            <tr>
                <td colspan="7"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                </td>
            </tr>
            </form>
        </table>
    </body>
</html>

