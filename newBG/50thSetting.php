<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="UTF-8" />
        <meta name="keywords" content=" " />
        <meta name="description" content=" " />
        <title>五十期需求設定</title>    
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
        #main {
            width: 900px;
            margin: 20px auto;
        }
        table {
            width: 500px;
            height: 300px;
        }
        input {
        font-size: 12px;
        }
        </style>
    </head>
    <body>
    <table id="main">
            <form id="demand" method="post" action="50thUpdate.php" accept-charset="utf-8">
                <tr>
                    <td colspan="5"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr> 
                <tr>
                    <td colspan="5" id="background"><font size="6">五十期需求設定</font></td>
                </tr> 
                <tr>
                    <td colspan="5"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>       
                <tr>                   
                    <td>1</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>       
                    <td>2</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>3</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>4</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>         
                    <td>5</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>                   
                    <td>6</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>       
                    <td>7</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>8</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>9</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>         
                    <td>10</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>                   
                    <td>11</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>       
                    <td>12</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>13</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>14</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>         
                    <td>15</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>                   
                    <td>16</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>       
                    <td>17</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>18</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>19</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>         
                    <td>20</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>                   
                    <td>21</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>       
                    <td>22</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>23</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>24</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>         
                    <td>25</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>                   
                    <td>26</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>       
                    <td>27</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>28</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>29</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>         
                    <td>30</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>                   
                    <td>31</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>       
                    <td>32</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>33</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>34</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>         
                    <td>35</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>                   
                    <td>36</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>       
                    <td>37</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>38</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>39</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>         
                    <td>40</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>                   
                    <td>41</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>       
                    <td>42</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>43</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>44</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>         
                    <td>45</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>                   
                    <td>46</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>       
                    <td>47</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>48</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>                
                    <td>49</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>         
                    <td>50</br><input type="demand" id="demand" name="demand[]" min="0" max="50" value="0" ></td>
                </tr>
                <tr>
                    <td colspan="5"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
                <tr>
                    <td colspan="5">
                        <!--<a id="button" href="50thDelete.php">刪除資料表資料</a>-->
                        <input id="button" type="reset" value="重新填寫" />
                        <input id="button" type="button" value="一鍵隨機" onClick='random()' />
                        <input id="button" type="submit" value="儲存" />
                    </td>
                </tr>
                <tr>
                    <td colspan="5"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr>
            </form>
        </table>   
    </body>
</html>