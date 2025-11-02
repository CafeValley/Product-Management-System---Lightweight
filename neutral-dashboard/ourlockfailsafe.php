<?php
require_once "solotheconnection.php";
mysqli_query($link, "UPDATE `members` SET `ourlock`= 0 ") or die(mysqli_error());
header("location:index.php");
?>