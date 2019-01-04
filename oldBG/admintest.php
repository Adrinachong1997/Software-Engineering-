<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>管理員界面</title>
        <style type="text/css">
        </style>
    </head>
    <body>
        <table id="main">
            <form id="team" method="post" action="?.php" accept-charset="utf-8">
                <tr>
                    <td colspan="5" id="background"><font size="6">已存在的房間</font></td>
                </tr>  
                <tr>
                    <td>團隊名稱</td>
                    <td>工廠</td>
                    <td>大盤商</td>
                    <td>批發商</td>
                    <td>零售商</td>
                </tr>
                <?php
                echo $_SESSION['id'];
                ?>
                <?php
                require("dbconfig.php");

                $sql = "select * from tgame;";
                $stmt = mysqli_prepare($db, $sql );
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt); 

                while (	$rs = mysqli_fetch_assoc($result)) {
                    echo"<tr><td>" , $rs['tname'] ,
                        "</td><td>";
                        if($rs['r1']!=NULL) {
                            echo "<input type='button' disabled='disabled' value='已被選'>";
                        }else {
                            echo "<input type='button' disabled='disabled' value='未被選'>";
                        }

                        echo "</td><td>";
                        if($rs['r2']!=NULL) {
                            echo "<input type='button' disabled='disabled' value='已被選'>";
                        }else {
                            echo "<input type='button' disabled='disabled' value='未被選'>";
                        }


                        echo "</td><td>";
                        if($rs['r3']!=NULL) {
                            echo "<input type='button' disabled='disabled' value='已被選'>";
                        }else {
                            echo "<input type='button' disabled='disabled' value='未被選'>";
                        }


                        echo "</td><td>";
                        if($rs['r4']!=NULL) {
                            echo "<input type='button' disabled='disabled' value='已被選'>";
                        }else {
                            echo "<input type='button' disabled='disabled' value='未被選'>";
                        }

                        
                    
                    "</td></tr>";

                }

                ?>
                <tr><td colspan="5"></td></tr>
                <tr>
                    <td colspan="5">
                        <a id="button" href="50th.php">設定五十期需求</a>
                    </td>
                </tr>
                <tr>
                    <td colspan="5"> 
                        <a id="button" href="edit.php">編輯個人資料</a>
                        <a id="button" href="loginout.php">登出</a>
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>
