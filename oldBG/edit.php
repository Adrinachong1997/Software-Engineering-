<?php
require_once("dbconfig.php");
//checkLogin();
?>
<!DOCTYPE html>
<html>
<body>
<p>Edit your data </p>
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
<form method="post" action="updateuser.php" enctype="multipart/form-data">
  <tr>
  <td><label>
      User ID: <input type="hidden" name="id" value="<?php echo $rs['id']; ?>" />
	  <?php echo $rs['id']; ?><br />
    </label></td>
    <td><label>
      Password : <input name="password" type="text" id="password" value="<?php echo $rs['password']; ?>" required /><br />
    </label></td>
    <img src="uploadfiles/<?php echo $img_name;?>.png" width="200" height="200"/>
    <td><input type="file" name="upload" id="upload" accept=".gif,.jpeg,.pjpeg,.png"/><br /></td>
  </tr>
<input type="submit" name="Submit" value="送出" />
</form>

<?php
} else echo "cannot find your data to edit.";

?>
</body>
</html>