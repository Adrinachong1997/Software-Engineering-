<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>管理員界面</title>
        <style type="text/css">
        #main {
            width: 1000px;
            margin: 70px auto;
        }
        table {
            width: 500px;
            height: 400px;
        }
        </style>
    </head>
    <body>
        <div class="admin">
        <table id="main">
            <form id="team" method="post" action="?.php" accept-charset="utf-8">
                <tr>
                    <td colspan="7"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr> 
                <tr>
                    <td colspan="7" id="background"><font size="6">房間列表管理</font></td>
                </tr>
                <tr>
                    <td colspan="7" id="background"><font size="4">
                        管理員 : <?php require("dbconfig.php");
                                echo $_SESSION['id'];?></font>
                    </td>
                </tr> 
                <tr>
                    <td colspan="7"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr> 
                <tr >
                    <td width="20px">房間名稱</td>
                    <td width="20px">工廠</br>Factory</td>
                    <td width="20px">大盤商</br>Distributer</td>
                    <td width="20px">批發商</br>Wholesale</td>
                    <td width="20px">零售商</br>Retailer</td>
                    <td width="20px">房間狀態</td>
                    <td width="20px">刪除</td>
                </tr> 
                <?php
                    require('gameModel.php');
                    adminShowTeam()
                ?>
                <tr>
                    <td colspan="7"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr> 
                <tr>
                <td colspan="7"> 
                        <a id="button" href="loginOut.php">登出</a>
                        <a id="button" href="edit.php">編輯個人資料</a>
                        <a id="button" href="50thSetting.php">設定五十期需求</a>
                    
                </tr>

                    <td colspan="7"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
          </form>
          <form method="post" action="../orderControl.php">
          <input type = "hidden" name="tname" value="<?php echo $tname; ?>"/>
          <input type = "hidden" name="pid" value="<?php echo $pid ?>"/>
          <input type = "hidden" name="operation" value="reset"/>
          <input id = "button" type = "submit" value = "重置"></form> 
        </td>
        </table>
    </div>
    </body>
</html>

