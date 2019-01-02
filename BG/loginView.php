<!DOCTYPE html>
<?php session_start();?>
<html>
<head>
<meta charset="UTF-8"/>
<title></title>
<style type="text/css">
</style>
<script type="text/javascript">

</script>
</head>
<body>
<h1>Login</h1><hr/>
<form method="post" action="loginControl.php">
User ID: <input type="text" name="id"><br />
Password : <input type="password" name="pwd"><br />
<input type="submit" value="確定"/> <input type="reset" value="重填"/><hr/>
<a href="preView.php">上一頁</a>
</form>
</body>
</html>