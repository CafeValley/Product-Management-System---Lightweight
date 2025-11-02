<?php require_once "config.php";
require_once "checkiffromup.php"; 

//print_r($_POST);

$productcata = $_POST['productcata'];


//$Msrnm     = $_POST['MemberName'];
//$Mpsswrd   = $_POST['MemberPassword'];


$query = "INSERT INTO `productcategory`(`cname`,`user_namel`,`timedofa`) VALUES ('$productcata','$suser_name',now())";


//ShowinaLine($query);

mysqli_query($link, $query);

header('Location:productcategories.php?RID');
?>