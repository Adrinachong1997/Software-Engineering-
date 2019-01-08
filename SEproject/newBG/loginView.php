<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8"/>
        <title>登入遊戲</title>
        <style type="text/css">
        #main {
            width: 500px;
            margin: 60px auto;
        }
        table {
            width: 300px;
            height: 300px;
        }
        </style>
        <script type="text/javascript">
        </script>
    </head>
    <body>
        <table id="main">
            <form id="team" method="post" action="loginControl.php">
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
                <tr>
                    <td colspan="2" id="background"><img src="../newBG/image/logo.png" width="400" height="100"/></br><img src="../newBG/image/logo2.png" width="140" height="50"/></td>
                </tr>
                <tr>
                    <td colspan="2" id="background"><font size="6">登入遊戲</font></td>
                </tr>
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="text" name="id" placeholder = "請輸入帳號">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="password" name="pwd" placeholder = "請輸入密碼">
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a id="button" href="index.php">返回主頁</a>
                        <input id="button" type="reset" value="重新填寫"/>
                        <input id="button" type="submit" value="登入"/> 
                    </td>
                </tr>
                <tr>
                    <td colspan="2"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>