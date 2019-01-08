<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>建立隊伍</title>
        <style type="text/css">
        #main {
            width: 400px;
            margin: 220px auto;
        }
        table {
            width: 300px;
            height: 100px;
        }
        </style>
    </head>
    <body>
        <table id="main">
            <form id="team" method="post" accept-charset="utf-8">
                <?php
                    //創造隊伍
                    require("gameModel.php");
                    $tname=$_POST['tname'];
                    //gameStart();
                    if( teamcheck($tname)==0){
                        echo '<tr><td>隊伍名稱重覆或已使用過，請再重新建立隊伍。</td></tr>';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=teamList.php>';
                    } else {
                        createTeam();
                        echo '<tr>',
                            '<td id="background"><font size="6">隊伍建立成功</font></td>',
                            '</tr><tr>',
                            '<td><img src="1.gif" width="200" height="200"/></br>等待遊戲開始</td>',
                            '</tr>';
                    }
                ?>           
            </form>
        </table>
    </body>
</html>