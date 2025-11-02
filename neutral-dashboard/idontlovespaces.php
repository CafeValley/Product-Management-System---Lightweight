<?php 
require_once "config.php"; 
require_once "funcconstatic.php"; 
require_once "checkiffromup.php";
$resultproudact = mysqli_query($link, "SELECT `id`, `pname` FROM `productname` ");
while ($rowproduct   = mysqli_fetch_array($resultproudact))
{
  $idvar            = $rowproduct['id'];
  $accountnamevar   = $rowproduct['pname'];
  $newpname = str_replace('  ', ' ', $accountnamevar);	
  $querytoupdate = "UPDATE `productname` SET `pname`='$newpname' WHERE `id` = $idvar";
  mysqli_query($link,$querytoupdate);
}
//
header("location:logout.php");
?>
	
  