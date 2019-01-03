
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>配隊成功！</title>
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
            <form id="team" method="post" accept-charset="utf-8">
				<?php
                require('dbconfig.php');
                require('userModel.php');

                $id=getCurrentUser();

                $role = $_POST['role'];
                
				$uid = $id ;

				$str_sec = explode(";",$role);
                
                
                
                
				echo '<tr><td colspan="2" id="background"><font size="6">成功加入隊伍</font></td>',
					"</tr><tr><td>",
                 "隊伍名稱</td><td>$str_sec[1]</td></tr>",
            
				print_r($str_sec);
                

				if ($str_sec[0] == 1) {
                    echo '<tr><td>角色</td><td>工廠</td></tr>';
					$sql = "update tgame set r1 = ? where tname = ? ";
					$stmt = mysqli_prepare($db, $sql);
					mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
                    mysqli_stmt_execute($stmt); //執行SQL
                    $result = mysqli_stmt_get_result($stmt); 
                 

				} 

				else if ($str_sec[0] == 2) {
                    echo '<tr><td>角色</td><td>大盤商</td></tr>';
					$sql = "update tgame set r2 = ? where tname = ? ";
					$stmt = mysqli_prepare($db, $sql);
					mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
					mysqli_stmt_execute($stmt); //執行SQL
                    $result = mysqli_stmt_get_result($stmt); 
              
				} 

				else if($str_sec[0] == 3) {
                    echo '<tr><td>角色</td><td>批發商</td></tr>';
					$sql = "update tgame set r3 = ? where tname = ? ";
					$stmt = mysqli_prepare($db, $sql);
					mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
					mysqli_stmt_execute($stmt); //執行SQL
                    $result = mysqli_stmt_get_result($stmt); 
                  
				} 

				else if ($str_sec[0] == 4) {	
                    echo '<tr><td>角色</td><td>零售商</td></tr>';
					$sql = "update tgame set r4 = ? where tname = ? ";
					$stmt = mysqli_prepare($db, $sql);
					mysqli_stmt_bind_param($stmt, "ss",$uid,$str_sec[1]);
					mysqli_stmt_execute($stmt); //執行SQL
                    $result = mysqli_stmt_get_result($stmt); 
                  
				} 
				else {
					echo "cannot update!";
				}
				?>
			</form>
		</table>
	</body>
</html>