<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>五十期資料設定</title>
        
        <script type="text/javascript">
        
        //隨機設定50期需求的函式
            function random() {
                var r = document.getElementsByTagName('input');
                for(i = 0 ; i < 50 ; i++) {
    　              r[i].value=randomInput(1, 20);
                }
                function randomInput(min, max) {
                    return parseInt(Math.random() * (max-min+1) + min);
                }
            }
        </script>

        <style type="text/css">
        body {
            background-image: url(1.jpg);
            background-attachment:fixed;
            font-size:20px;
            color:#080c0f;  
        }
        #main {
            width: 450px;
            margin: 50px auto;
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
            font-size: 16px;
            text-align: center;
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
            padding: 1px 90px;
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
        </style>
    </head>
    <body>

    <table id="main">
            <form id="setno" method="post" action="send.php" accept-charset="utf-8">
                <tr>
                    <td colspan="5" id="background"><font size="6">五十期資料設定</font></td>
                </tr>       
                <tr>                   
                    <td colspan="1">1<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>       
                    <td colspan="1">2<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">3<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">4<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>         
                    <td colspan="1">5<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>
                </tr>
                <tr>                   
                    <td colspan="1">6<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>       
                    <td colspan="1">7<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">8<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">9<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>         
                    <td colspan="1">10<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>
                </tr>
                <tr>                   
                    <td colspan="1">11<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>       
                    <td colspan="1">12<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">13<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">14<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>         
                    <td colspan="1">15<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>
                </tr>
                <tr>                   
                    <td colspan="1">16<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>       
                    <td colspan="1">17<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">18<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">19<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>         
                    <td colspan="1">20<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>
                </tr>
                <tr>                   
                    <td colspan="1">21<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>       
                    <td colspan="1">22<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">23<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">24<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>         
                    <td colspan="1">25<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>
                </tr>
                <tr>                   
                    <td colspan="1">26<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>       
                    <td colspan="1">27<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">28<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">29<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>         
                    <td colspan="1">30<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>
                </tr>
                <tr>                   
                    <td colspan="1">31<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>       
                    <td colspan="1">32<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">33<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">34<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>         
                    <td colspan="1">35<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>
                </tr>
                <tr>                   
                    <td colspan="1">36<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>       
                    <td colspan="1">37<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">38<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">39<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>         
                    <td colspan="1">40<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>
                </tr>
                <tr>                   
                    <td colspan="1">41<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>       
                    <td colspan="1">42<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">43<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">44<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>         
                    <td colspan="1">45<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>
                </tr>
                <tr>                   
                    <td colspan="1">46<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>       
                    <td colspan="1">47<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">48<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>                
                    <td colspan="1">49<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>         
                    <td colspan="1">50<input type="setno" id="setno" name="setno[]" min="0" max="50" value="0" ></td>
                </tr>
                

                <tr>
                    <td colspan="5"><input id="button" type="submit" value="儲存" /></td>
                </tr>     
                <tr>
                    <td colspan="5"><input id="button" type="button" value="一鍵隨機" onClick='random()' /></td>
                </tr>
                <tr>
                    <td colspan="5"><input id="button" type="reset" value="重新填寫" /></td>
                </tr>
                </tr>
            </form>
  
        </table>
        
    </body>
</html>