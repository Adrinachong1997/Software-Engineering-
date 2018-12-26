<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>五十期資料設定</title>
        
        <style type="text/css">
         body {
            background-image: url(1.jpg);
            background-attachment:fixed;
            font-size:20px;
            color:#080c0f;  
        }
        #main {
            width: 450px;
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
	<?php
	require('dbconfig.php');
	//$no=$_POST['no'];
	$setno=$_POST['setno'];
	$sqlData=0;
	if ($db) {
		echo'<table id="main">',
			'<tr><td colspan="2">',
				'<font size="6">資料已新增</font>',
			'</td></tr>',
			'<tr><td colspan="2">',
				'<a id="button" href="??.php">啟動競賽</a>',
			'</td></tr>'
			
		;
		
		for($i = 0 ; $i < 50 ; $i++) {
			$sqlData = $setno[$i];
			$no = $i + 1;
			$sql = "insert into gamecycle (no, setno) values (?,?)";
			$stmt = mysqli_prepare($db, $sql); //prepare sql statement
			mysqli_stmt_bind_param($stmt, "ii", $no, $sqlData); //bind parameters with variables
			mysqli_stmt_execute($stmt);  //執行SQL
		}
	} else {
		echo 'empty title, cannot insert.';
	}
	
	?>	
	</body>
</html>

