<?php
    require("dbconfig.php"); 
    require("TeamRank.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <title>遊戲結束</title>
    </head>
    <body>
        <table id="main">
            <form>
                <tr>
                    <td colspan="2" rowspan="1">
                        用戶名 : <?php echo $_SESSION['id'];?></br>
                        <img src="uploadfiles/<?php echo $_SESSION['id'];?>.png" width="50%"/>
                        遊戲積分 :<?php
                                require_once("userMOdel.php");
                                $result=get_score($_SESSION['id']);
                                while($rs =mysqli_fetch_assoc($result)){
                                    $score=$rs['score'];
                                } 
                               echo $score ?> </br>        
                    </td>
                </tr>
                <tr>
                    <td colspan="6">
                        <a id="button" href="loginOut.php">登出</a>
                        <a id="button" href="teamList.php">返回隊伍大廳</a>
                        <!-- <a id="button" href="XXXXXX.php">遊戲報表</a>     我不知道報表的程式是哪一支-->
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
