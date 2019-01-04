<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>加入遊戲</title>
        <style type="text/css">
         body {
            background-image: url(1.jpg);
            background-attachment:fixed;
            font-size:20px;
            color:#080c0f;  
        }
        #main {
            width: 600px;
            margin: 140px auto;
            border: 10px #f0f8ff solid ;
            padding: 13px;            
            background: #37322f86
        }
        table {
            width: 50px;
            height: 300px;
        }
        th ,td {
            border: 0px solid ;
	        color:#f0f8ff;  
            text-align:center;
            background-color:#37322f86;
        }
        input{           
            font-size: 20px;
            color:#666666; 
        }
        select{
            width: 200px;
            height: 30px;
        }
        #background{
            background-color:#37322f86;
            color:#f0f8ff;         
        }
        #button{
            background-color: #f8f4f4;   
            padding: 1px 80px;
            text-align: center;
            display: inline-block;
            font-size: 20px;
            transition-duration: 0.2s;
            border: 0px solid ;
        }
        #button:hover{
            background-color: #ffffff59;
            color: #070707;
        }
		a{
            text-decoration: none;
            color: #000000;
        }
        </style>
    </head>
    <body>
        <table id="main">
            <form id="team" method="post" action="update.php" accept-charset="utf-8">
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

                //列出所有等待中隊伍及各角色選取情況
                while (	$rs = mysqli_fetch_assoc($result)) {
                    echo"<tr><td>" , $rs['tname'] ,
                        "</td><td>";
                        if($rs['r1']!=NULL) {
                            echo "<input type='button' disabled='disabled' value='已被選'>";
                        }else {
                            echo "<input name='role' type='radio' id='role' value='1;" . $rs['tname'] . "' >";
                        }

                        echo "</td><td>";
                        if($rs['r2']!=NULL) {
                            echo "<input type='button' disabled='disabled' value='已被選'>";
                        }else {
                            echo "<input name='role' type='radio' id='role' value='2;" . $rs['tname'] . "' >";
                        }

                        echo "</td><td>";
                        if($rs['r3']!=NULL) {
                            echo "<input type='button' disabled='disabled' value='已被選'>";
                        }else {
                            echo "<input name='role' type='radio' id='role' value='3;" . $rs['tname'] . "' >";
                        }

                        echo "</td><td>";
                        if($rs['r4']!=NULL) {
                            echo "<input type='button' disabled='disabled' value='已被選'>";
                        }else {
                            echo "<input name='role' type='radio' id='role' value='4;" . $rs['tname'] . "' >";
                        }
                        
                    
                    "</td></tr>";

                }

                ?>
                <tr><td colspan="5"></td></tr>
                <tr>
                    <td colspan="5">
                        <a id="button" href="nteam.php">建立隊伍</a>
                        <input id="button" type="submit" name="Submit" value="送出" />
                        <a id="button" href="edit.php">edit</a>
                        <a id="button" href="loginout.php">Sign out</a>
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>
