<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>五十期資料設定</title>
        
        <style type="text/css">
        </style>
    </head>
	<body>
        <?php
        require('dbconfig.php');
        //$no=$_POST['no'];
        $setno=$_POST['setno'];
        $sqlData=0;
        //把50期需求存入資料庫
        if ($db) {echo'<table id="main" method="post" action="update.php">',
            '<tr><td colspan="2">',
                '<font size="6">資料已新增</font>',
            '</td></tr>';
            
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
        <!--啟動遊戲的按鈕 -->
        <table id="main">
            <form id="setno" method="post" action="gstart.php" accept-charset="utf-8">
                <tr><td colspan="2"> 
                    <input name="button" type="submit" id="button" value="啟動遊戲" />    
                </td></tr>
            </form>
        </table>
	</body>
</html>

