<?php
    require_once("dbconfig.php");
    //checkLogin();
?>
<!DOCTYPE html>
    <html>
        <head>
            <link rel="stylesheet" type="text/css" href="style.css" />
            <meta charset="UTF-8"/>
            <title>編輯用戶資料</title>
            <style type="text/css">
            #main {
            width: 800px;
            margin: 70px auto;
            }
            table {
                width: 500px;
                height: 400px;
            }
            </style>
            <script type="text/javascript">
            </script>
        </head>
        <body>
        <table id="main">
            <form id="team" method="post" action="updateUser.php" enctype="multipart/form-data">
                <tr>
                    <td colspan="3"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr> 
                <tr>
                    <td colspan="3" id="background"><font size="6">編輯用戶資料 <hr></font></td>
                </tr>
                <?php
                    require("userModel.php");
                    $id=getCurrentUser();
                    $img_name=pic_name($id);
                    $sql = "select * from user where id=?;";
                    $stmt = mysqli_prepare($db, $sql );
                    mysqli_stmt_bind_param($stmt, "s", $id);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt); 
                        
                    if ($rs=mysqli_fetch_array($result)) {
                            
                ?>
                <tr>
                    <td id="r">用戶名稱⠀⠀⠀<input type="hidden" name="id" value="<?php echo $rs['id']; ?>" /></td>
                    <td>
                        <?php echo $rs['id']; ?><br /></label>
                    </td>
                    <td rowspan="3">
                        目前個人照片</br></br><img src="uploadfiles/<?php echo $img_name;?>.png" width="40%"/>
                    </td>
                </tr>
                <tr>
                    <td id="r">新密碼⠀⠀⠀</td>
                    <td>
                        <input name="password" type="text" id="password" value="<?php echo $rs['password']; ?>" required /><br />
                    </td>
                </tr>
                <tr>
                    <td id="r">更新個人照片⠀⠀⠀</td>
                    <td>
                        <input type="file" name="upload" id="file" accept=".gif,.jpeg,.pjpeg,.png"/><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="3"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀<hr>
                    </td>
                </tr> 
                <tr>
                    <td colspan="3">
                        <input id="button" type="submit" name="Submit" value="送出" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3"> ⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀⠀
                    </td>
                </tr> 
        </form>

<?php
    } else echo "cannot find your data to edit.";

?>
</body>
</html>