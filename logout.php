<?php
require("connect.php");
require("g.function.inc.php");
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_ID']);
unset($_SESSION['USER_NAME']);
header('location:index.php'); 
?>