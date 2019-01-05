<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>加入遊戲</title>
        <style type="text/css">
        #main {
            width: 900px;
            margin: 90px auto;
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
            <form id="team" method="post" action="teamUpdate.php" accept-charset="utf-8">
                <tr>
                    <td colspan="6" id="background"><font size="6">房間列表</font></td>
                </tr>
                <tr>
                    <td colspan="6" id="background"><font size="4">
                        用戶名 : <?php require("dbconfig.php");
                                echo $_SESSION['id'];?></font>
                    </td>
                </tr>
                <tr>
                    <td width="20px">房間名稱</td>
                    <td width="20px">工廠</br>Factory</td>
                    <td width="20px">大盤商</br>Distributer</td>
                    <td width="20px">批發商</br>Wholesale</td>
                    <td width="20px">零售商</br>Retailer</td>
                    <td width="20px">房間狀態</td>
                </tr>
                <?php 
                    //列出現有可加入隊伍
                    require('gameModel.php');
                    showTeam();
                ?>
                <tr><td colspan="6"></td></tr>
                <tr>
                    <td colspan="6">
                        <a id="button" href="createTeam.php">建立隊伍</a>
                        <input id="button" type="submit" name="Submit" value="送出" />
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <a id="button" href="edit.php">編輯個人資料</a>
                        <a id="button" href="loginOut.php">登出</a>
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>
