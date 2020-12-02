<?php
session_start();
unset($_SESSION["username"]);
unset($_SESSION["ChucVu"]);
header("Location:login.php");
?>