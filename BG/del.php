<?php
require('dbconfig.php');
//$no=$_POST['no'];
$id=(int)$_GET['setno'];
$sqlData=0;
        //刪除資料庫資料語法

            $sql = "delete from gamecycle where id=?;";
            $stmt = mysqli_prepare($db, $sql );
            mysqli_stmt_bind_param($stmt, "i", $id);
            mysqli_stmt_execute($stmt);
        

?>