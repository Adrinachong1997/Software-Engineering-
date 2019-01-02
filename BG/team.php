<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>建立隊伍</title>
        <style type="text/css">
        </style>
    </head>
    <body>
        <table id="main">
            <form id="team" method="post" accept-charset="utf-8">
                <tr>
                    <td id="background"><font size="6">隊伍建立成功</font></td>
                </tr>
                <tr>
                    <td><img src="1.gif" width="200" height="200"/></br>等待遊戲開始</td>
                </tr>
                
                <?php
                require('dbconfig.php');
                require("userModel.php");
                $id = getCurrentUser();

                global $db;
             
                $role=$_POST['role'];
                $tname=$_POST['tname'];
                if ($tname) {
                    $sql1 = "insert into tgame (tname,r$role) values (?,?);";
                    $stmt1 = mysqli_prepare($db, $sql1); 
                    mysqli_stmt_bind_param($stmt1, "ss",$tname,$id); 
                    mysqli_stmt_execute($stmt1);  
                    echo "room added.";
                } else {
                    echo "empty title, cannot insert.";
                }
                ?>
            </form>
        </table>
    </body>
</html>