<?php 
require_once "config.php";
//require_once "checkiffromup.php"; 

print_r($_POST);

$nameofcata = $_POST['proudctnameboxselect'];
$cataid = catafromnametoid($nameofcata);
$pricepercen = $_POST['newboughtprice'];
echo "-";
$pricepercen = preg_replace('/[^0-9]/', '', $pricepercen);
	
$sqlprince = "SELECT `idprod`  FROM `productprice` WHERE `cataid` = $cataid and active = 1";                    
$resultprice = mysqli_query($link, $sqlprince);
while($rowprice = mysqli_fetch_array($resultprice))
{
	$productid = $rowprice['idprod'];
	changepricewithper($productid, $cataid,$pricepercen);
}

header('Location:productpricecata.php?RID&cataid='.$cataid);
?>