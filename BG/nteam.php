<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>配隊</title>
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
            <form id="team" method="post" action="team.php" accept-charset="utf-8">
                <tr>
                    <td colspan="5" id="background"><font size="6">隊伍配對</font></td>
                </tr>       
                <tr>
                    <td>你的團隊名稱</td>
                    <td>零售商</td>
                    <td>批發商</td>
                    <td>大盤商</td>
                    <td>工廠</td>
                </tr>
                <tr>
                    <td>
                        <label><input name="tname" type="text" id="tname" /></label>
                    </td>
                    <td>
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
                    </td>
                </tr>
                <tr>
                    <td colspan="5"><input id="button" type="submit" value="儲存" /></td>
                </tr>   
            </form>
        </table>
    </body>
</html>