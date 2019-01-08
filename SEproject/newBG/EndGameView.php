<?php require("dbconfig.php"); ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>遊戲結束</title>
        <style type="text/css">
        #main {
            width: 500px;
            margin: 50px auto;
        }
        table {
            width: 500px;
            height: 400px;
        }
		</style>
    </head>
    <body>
		<table id="main">
            <form id="team" method="post" accept-charset="utf-8">
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
                <tr>
                    <td colspan="2" id="background"><font size="6">遊戲結束</font></td>
                </tr>
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <img src="uploadfiles/<?php echo $_SESSION['id'];?>.png" width="50%"/>
                    </td>
                </tr>
                <tr>
                    <td id="r">
                        用戶名稱 : 
                    </td>
                    <td id="l">
                    ⠀⠀<?php echo $_SESSION['id'];?>
                    </td>
                </tr>
                <tr>
                    <td id="r">
                        遊戲積分 : 
                    </td>
                    <td id="l">
                    ⠀⠀<?php
                            require_once("userMOdel.php");
                            $result=get_score($_SESSION['id']);
                            while($rs =mysqli_fetch_assoc($result)){
                                $score=$rs['score'];
                            } 
                            echo $score ;
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <u>組內排名</u> 
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
                <?php  
                    require("TeamRank.php");
                ?>
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a id="button" href="loginOut.php">登出</a>
                        <a id="button" href="teamList.php">返回隊伍大廳</a>
                        <a id="button" href="printChart.html">遊戲報表</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr> 
            </form>
            
        </table>
    </body>
</html>
