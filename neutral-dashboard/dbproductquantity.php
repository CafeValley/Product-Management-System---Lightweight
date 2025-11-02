<?php require_once "config.php";
require_once "checkiffromup.php"; 

print_r($_POST);

$prodid = $_POST['pnameid'];
$cataid = $_POST['cataid'];
$qauntno = $_POST['qansize'];


$Sqlforoldquan = "SELECT  `numberin` FROM `productquantit` where `idprod` = '$prodid' ";
$resultToldquan = mysqli_query($link, $Sqlforoldquan);
$rowoldquan = mysqli_fetch_assoc($resultToldquan);

if (isset($rowoldquan['numberin']))
    $oldquanti = $rowoldquan['numberin'];
else
    $oldquanti = 0;

$qauntnonew = $qauntno + $oldquanti;

$Sqlquanchange = "UPDATE `productquantit` SET `numberin` = '$qauntnonew'  WHERE `idprod` = '$prodid'";
//mysqli_query($link,$SqlforName );

ShowinaLine($qauntnonew);
ShowinaLine($Sqlquanchange);

mysqli_query($link, $Sqlquanchange);

header('Location:prouductquantity.php?RID&newquan='.$qauntnonew);
?>