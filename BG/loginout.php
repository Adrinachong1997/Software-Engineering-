<?php
require("userModel.php");
session_destroy();
unset($_SESSION['id']);
loginout();

header("Location:loginView.php");
?>