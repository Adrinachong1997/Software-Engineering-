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
            </style>
            <script type="text/javascript">
            </script>
        </head>
        <body>
        <table id="main">
            <form id="team" method="post" action="updateUser.php" enctype="multipart/form-data">
                <tr>
                    <td colspan="2" id="background"><font size="6">編輯用戶資料</font></td>
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
                    <td>
                        <label>用戶名稱 : <input type="hidden" name="id" value="<?php echo $rs['id']; ?>" />
                    </td>
                    <td>
                        <?php echo $rs['id']; ?><br /></label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>新密碼 : 
                    </td>
                    <td>
                        <input name="password" type="text" id="password" value="<?php echo $rs['password']; ?>" required /><br />
                        </label>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        目前個人照片</br></br><img src="uploadfiles/<?php echo $img_name;?>.png" width="200" height="300"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>更新個人照片 : 
                    </td>
                    <td >
                        <input type="file" name="upload" id="upload" accept=".gif,.jpeg,.pjpeg,.png"/><br />
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="Submit" value="送出" />
                    </td>
                </tr>
        </form>

<?php
    } else echo "cannot find your data to edit.";

?>
</body>
</html>