<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="loginView.css" />
        <meta charset="UTF-8"/>
        <title>登入遊戲</title>
        <style type="text/css">
        </style>
        <script type="text/javascript">
        </script>
    </head>
    <body>
        <table id="main">
            <form id="team" method="post" action="loginControl.php">
                <tr>
                    <td colspan="2" id="background"><font size="6">登入遊戲</font></td>
                </tr>
                <tr>
                    <td>  
                        用戶名稱 :
                    </td>
                    <td>
                        <input type="text" name="id">
                    </td>
                </tr>
                <tr>
                    <td>
                        帳號密碼 : 
                    </td>
                    <td>
                        <input type="password" name="pwd">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input id="button" type="submit" value="確定"/> 
                        <input id="button" type="reset" value="重填"/>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <a id="button" href="preView.php">上一頁</a>
                    </td>
                </tr>
            </form>
        </table>
    </body>
</html>