<?php
require_once "solotheconnection.php";
mysqli_query($link, "UPDATE `members` SET `ourlock`= 0  WHERE `M_name` = '$suser_name' ") or die(mysqli_error());
session_destroy();
include("dumperuser.php");
header("location:index.php");
?>