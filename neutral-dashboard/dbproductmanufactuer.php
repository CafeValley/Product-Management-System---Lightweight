<?php require_once "config.php";
require_once "checkiffromup.php"; 

print_r($_POST);

$manname    = $_POST['manfname']; 
$manamount  = $_POST['manamount']; 

$inorout    = $_POST['inotout']; 
$mandesc    = $_POST['mandesc']; 
$mandate    = changedateformate(Eatdayformat($_POST['Day'],$_POST['Month'],$_POST['Year']));	
$mandate2nd    = changedateformate(Eatdayformat($_POST['Day2nd'],$_POST['Month2nd'],$_POST['Year2nd']));	
	


echo $query = "INSERT INTO `manfacdelaypayment`(manfdate2nd,`note`,`manfname`, `manfamount`, `inorout`, `manfdate`, `active`, `user_namel`, `timedofa`) VALUES ('$mandate2nd','$mandesc','$manname','$manamount','$inorout','$mandate','1','$suser_name',now())";
mysqli_query($link, $query);

//ShowinaLine($query);


header('Location:productmanufactuer.php?RID');
?>