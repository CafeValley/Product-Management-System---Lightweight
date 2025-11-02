<?php require_once "config.php";
require_once "checkiffromup.php"; 

print_r($_POST);

$accountname   = $_POST['accountname'];
$sourceofcash  = $_POST['sourceofcash']; 
$amountpayed   = $_POST['amountpayed']; 
$typeofpayment = $_POST['typepayment']; 
$note          = $_POST['note']; 
$soldate       = changedateformate(Eatdayformat($_POST['Day'],$_POST['Month'],$_POST['Year']));
$inorout       = $_POST['inotout']; 


$Sqlinside = "INSERT INTO `accountp`( `accountnamerecept`,`accountname`, `accountroot`, `method`, `accountdesc`, `accountamount`, `inorout`, `accountdate`,`user_namel`,`timedofa`) 
								VALUES ('  ','$accountname','$sourceofcash','$typeofpayment','$note','$amountpayed','$inorout','$soldate','$suser_name',now())";
mysqli_query($link,$Sqlinside );

//ShowinaLine($qauntnonew);
//ShowinaLine($Sqlquanchange);

header ('Location:productpayment.php?RID');
?>