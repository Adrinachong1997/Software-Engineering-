<!DOCTYPE html>
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
        <!--尚未完成-->
        <table id="main">
            <form id="team" method="post" action="update.php" accept-charset="utf-8">
                <tr>
                    <td colspan="5" id="background"><font size="6">gstart</font></td>
                </tr> 
                <?php
                require('dbconfig.php');
                $button = $_POST['button'];
				$uid = 90;

                
                
                
                
				
                echo "(11,$button)";


				if ($button == 1) {
                    echo '<tr><td>角色</td><td>工廠</td></tr>';
					$sql = "insert into gstart (go) values (?)";
					$stmt = mysqli_prepare($db, $sql);
					mysqli_stmt_bind_param($stmt, "s",$button);
					mysqli_stmt_execute($stmt); //執行SQL
                    echo "</br><a href='test.php'>返回</a>";
                }
                     ?>
            </form>
        </table>
    </body>
</html>