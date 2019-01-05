<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>建立隊伍</title>
        <style type="text/css">
        #main {
            width: 500px;
            margin: 130px auto;
        }
        table {
            width: 300px;
            height: 300px;
        }
        </style>
    </head>
    <?php
        require("userModel.php");
        $id=getCurrentUser();
        echo $id;
    ?>
    <body>
        <!-- 建立隊伍的介面-->
        <table id="main">
            <form id="team" method="post" action="createTeamUpdate.php" accept-charset="utf-8">
                <tr>
                    <td id="background"><font size="6">建立隊伍</font></td>
                </tr>       
                <tr>
                    <td>你的團隊名稱</td>
                    <!-- <td>工廠Factory</td>
                    <td>大盤商Distributer</td>
                    <td>批發商Wholesale</td>
                    <td>零售商Retailer</td>-->
                </tr>
                <tr>
                    <td>
                        <label><input name="tname" type="text" id="tname" /></label>
                    </td>
                    <!-- <td>
                        <label><input name="role" type="radio" id="r1" value="1"/></label>
                    </td>
                    <td>
                        <label><input name="role" type="radio" id="r2" value="2"/></label>
                    </td>
                    <td>
                        <label><input name="role" type="radio" id="r3" value="3"/></label>
                    </td>
                    <td>
                        <label><input name="role" type="radio" id="r4" value="4"/></label>
                    </td>-->
                </tr>
                <tr>
                    <td><input id="button" type="submit" value="儲存" /></td>
                </tr>   
            </form>
        </table>
    </body>
</html>