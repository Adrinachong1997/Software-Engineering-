<?php 
    require("dbconfig.php"); 
?>
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
            margin: 60px auto;
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
                    <td colspan="6"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr> 
                <tr>
                    <td colspan="4" id="background"><font size="6">房間列表</font></td>
                    <td id="l">
                        用戶名稱 : <?php echo $_SESSION['id'];?></br>
                        遊戲積分 : 
                                <?php
                                require_once("userMOdel.php");
                                $result=get_score($_SESSION['id']);
                                while($rs =mysqli_fetch_assoc($result)){
                                    $score=$rs['score'];
                                } 
                                echo $score ?>
                    </td>
                    <td rowspan="1">
                        <img src="uploadfiles/<?php echo $_SESSION['id'];?>.png" width="50%"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="6"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
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
                <tr>
                    <td colspan="6"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr> 
                <tr>
                    <td colspan="6">
                        <a id="button" href="loginOut.php">登出</a>
                        <a id="button" href="edit.php">編輯個人資料</a>
                        <a id="button" href="../Leaderboard.php">排行鎊</a>
                        <a id="button" href="History.php">遊戲參與紀錄</a>
                        <a id="button" href="createTeam.php">建立隊伍</a>
                        <input id="button" type="submit" name="Submit" value="加入隊伍" />
                    </td>
                </tr>
                <tr>
                    <td colspan="6"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>

                </tr> 
            </form>
            
        </table>
    </body>
</html>
