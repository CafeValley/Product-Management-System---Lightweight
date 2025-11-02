<?php
require_once "config.php";
//require_once "checkiffromup.php";

print_r($_POST);

$nameofcata = $_POST['proudctnameboxselect'];
$cataid = catafromnametoid($nameofcata);
$pricepercen = $_POST['newboughtprice'];
echo "-";
$pricepercen = preg_replace('/[^0-9]/', '', $pricepercen);

$sqlprince = "SELECT `idprod` , `cataid`  FROM `productprice` WHERE active = 1";
$resultprice = mysqli_query($link, $sqlprince);
while($rowprice = mysqli_fetch_array($resultprice))
{
	$productid = $rowprice['idprod'];
	$cataidin = $rowprice['cataid'];
	changepricewithper($productid, $cataidin,$pricepercen);
}

header('Location:productallprice.php?RID&cataid=');
?>
