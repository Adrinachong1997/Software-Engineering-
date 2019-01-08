<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>加入遊戲</title>
        <style type="text/css">
        </style>
    </head>
    <body>
        <table id="main">
            <form id="team" method="post" action="update.php" accept-charset="utf-8">
                <tr>
                    <td colspan="5" id="background"><font size="6">gstart</font></td>
                </tr> 
                <?php
                require("gameModel.php");
                gameStart();
                
                ?>
            </form>
        </table>
    </body>
</html>