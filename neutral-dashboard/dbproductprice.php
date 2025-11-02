<?php require_once "config.php";
require_once "checkiffromup.php"; 

print_r($_POST);

$prodid         = $_POST['pnameid'];
$cataid         = $_POST['cataid'];
$newboughtprice = $_POST['newboughtprice'];
$newsoldprice   = $_POST['newsoldprice'];


$SqlforName = "UPDATE `productprice` SET `active` = '0' WHERE `idprod`  = '$prodid'";
mysqli_query($link, $SqlforName);

ShowinaLine($SqlforName);
$SqlforName = "INSERT INTO `productprice`( `idprod`, `pricein`, `pricetobesold`, `active`, `cataid`,`user_namel`,`timedofa`) VALUES ('$prodid','$newboughtprice','$newsoldprice','1','$cataid','$suser_name',now())";

mysqli_query($link, $SqlforName);

ShowinaLine($SqlforName);

//mysqli_query ($link , $query);

header('Location:productprice.php?RID&pricebought='.$newboughtprice.'&priceold='.$newsoldprice);
?>