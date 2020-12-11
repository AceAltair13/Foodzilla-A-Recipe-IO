<?php
$data=$_COOKIE["username"];
$mail=$_COOKIE["email"];
session_start();
session_unset();
session_destroy();
setcookie("username",$data, time() - 3600);
setcookie("email",$mail, time() - 3600);
header("location: login.php");
