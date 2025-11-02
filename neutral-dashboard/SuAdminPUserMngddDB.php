<?php require_once "config.php";
require_once "checkiffromup.php";

print_r($_POST);
$Msrnm     = $_POST['MemberName'];
$Mpsswrd   = $_POST['MemberPassword'];


$query = "INSERT INTO `members`(`M_name`, `M_password`, `M_type`) 
VALUES ('$Msrnm','$Mpsswrd','Admin')";
 
 
//ShowinaLine($query);

mysqli_query ($link , $query);

header ('Location:SuAdminPUserMngdd.php?RID');
?>