<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>註冊帳號</title>
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
                    require("dbconfig.php");
                    require("userModel.php");
                    $userName = $_POST['id'];
                    $passWord = $_POST['pwd'];
                    $Email = $_POST['mail'];
                    if(id_check($userName)==0){
                        echo '<tr><td>帳號重覆，請再重新註冊。</td></tr>';
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=enroll.html>';
                    }else{
                        pic_upload($userName);
                    $sql = "INSERT INTO user (id, password, mail) VALUES(?, ?, ?)"; 
                    $stmt = mysqli_prepare($db, $sql);
                            mysqli_stmt_bind_param($stmt, "sss", $userName, $passWord, $Email);	// 較安全的寫法 s:表示字串型態 對應後面的參數($id, $pwd)
                            mysqli_stmt_execute($stmt); //執行SQL

                    //重新導向回到主畫面
                    header("Location:loginView.php");
                    }
                ?>                     
            </form>
        </table>
    </body>
</html>