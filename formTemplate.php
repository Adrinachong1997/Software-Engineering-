<form method="post" action="orderControl.php">
    <input type = "hidden" name="pid" value=<?php echo $pid ?>/>
    <input type = "hidden" name="serno" value=<?php echo $serno ?>/>
    <input type = "hidden" name="operation" value="update"/>
    <p>目前是第
    <?php //從period撈目前週次
        // $result = getCurrentPeriod();
        // // 判断四个同时一起按submit，TODO
        // while($rs=mysqli_fetch_assoc($result)){
        //     $currWeek = $rs['week']+1;
        //     echo $currWeek;
        // }

        $result = countOrder($serno,$pid);
        if($result == 1)
        $currWeek = $result;
        echo $currWeek;
    ?>
    周
    </p>
    <p>消費者上週要求的啤酒數量：
    <?php //從gamecycle撈目前的消費者要去
        $result= getCurrentDemand($pid,$currWeek);
        if($rs=mysqli_fetch_assoc($result)){
            echo $rs['demand'];
        }
    ?>
    </p>
    請輸入本週訂購的啤酒數量:<?php ?>
    <input type = "hidden" name="week" value="<?php echo $currWeek ?>"/>
    <input type ="text" name="order">
    <input type ="submit" value=" 下單 " />
</form>
<form method="post" action="orderControl.php">
    <input type = "hidden" name="serno" value=<?php echo $serno ?>/>
    <input type = "hidden" name="pid" value=<?php echo $pid ?>/>
    <input type = "hidden" name="operation" value="reset"/>
    <input type = "submit" value = "重置"> 
</form>