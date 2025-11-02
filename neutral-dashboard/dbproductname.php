<?php require_once "config.php";
require_once "checkiffromup.php"; 
print_r($_POST);

$productname = $_POST['productname'];
$pricebought = $_POST['pricebuyproduct'];
$pricetosell = $_POST['pricesellproduct'];
$prouductqanti = $_POST['productqanti'];
$prouductqanti = preg_replace('/[^0-9]/', '', $prouductqanti);

$cataid = $_POST['cataid'];
$packid = $_POST['packetid'];

echo $cataname = catafromidtoname($cataid);
redirectcheckproductcata($productname,$cataname,"productname.php");



$queryproduname = "INSERT INTO `productname`(`pname`,`user_namel`,`timedofa`) VALUES ('$productname','$suser_name',now())";
mysqli_query($link, $queryproduname);

$maxid = getlastid();

$queryquanti = "INSERT INTO `productquantit`( `idprod`, `numberin`, `cataid`,`user_namel`,`timedofa`) 
VALUES ('$maxid','$prouductqanti','$cataid','$suser_name',now())";

$queryprice = "INSERT INTO `productprice`( `idprod`, `pricein`, `pricetobesold`, `active`, `cataid`,`user_namel`,`timedofa`) 
VALUES ('$maxid','$pricebought','$pricetosell','1','$cataid','$suser_name',now())";


mysqli_query($link, $queryquanti);
mysqli_query($link, $queryprice);


ShowinaLine($maxid);
ShowinaLine($queryproduname);
ShowinaLine($queryquanti);
ShowinaLine($queryprice);


header('Location:productname.php?RID');

?>