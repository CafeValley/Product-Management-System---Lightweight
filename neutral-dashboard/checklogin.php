<?php
require_once "solotheconnection.php";
//check if the form has been submitted
//cleanup the variables
//prevent mysql
/*
to clear the past temp orders

*/
#needed for fixing long distince database fixes
$result = mysqli_query($link, "SHOW COLUMNS FROM `productsells` LIKE 'whodidthis'");
$exists = (mysqli_num_rows($result))?TRUE:FALSE;
if(!$exists)
{
    mysqli_query($link, "ALTER TABLE `productsells` ADD `whodidthis` VARCHAR(100) NOT NULL AFTER `orderno`;");

}
#needed for fixing long distince database fixes
$result = mysqli_query($link, "SHOW COLUMNS FROM `productsellstemp` LIKE 'whodidthis'");
$exists = (mysqli_num_rows($result))?TRUE:FALSE;
if(!$exists)
{

    mysqli_query($link, "ALTER TABLE `productsellstemp` ADD `whodidthis` VARCHAR(100) NOT NULL AFTER `customername`;");
}

#needed for fixing long distince database fixes
$result = mysqli_query($link, "SHOW COLUMNS FROM `members` LIKE 'ourlock'");
$exists = (mysqli_num_rows($result))?TRUE:FALSE;
if(!$exists)
{

    mysqli_query($link, "ALTER TABLE `members` ADD `ourlock` INT(1) NOT NULL DEFAULT '0' AFTER `M_last_login`;");
}


$username = $_POST['fusername'];
$password = $_POST['fpassword'];
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($link,$username);
$password = mysqli_real_escape_string($link,$password);
//$password = md5($password);


$sql = mysqli_query($link, "SELECT count(*) as checkcount FROM `members` WHERE `M_name` = '$username' and `M_password` = '$password' and ourlock = 0  ") or die(mysqli_error());

// If result matched $username and $password.
$countarray = mysqli_fetch_array($sql);
$count = $countarray['checkcount'];

if ($count > 0) {
    $_SESSION['suser_name'] = $username;
    ##delete last temp orders for this user
	mysqli_query($link,"DELETE FROM `productsellstemp` where `whodidthis` = '$username'");

    $sql = mysqli_query($link, "SELECT M_type FROM `members` WHERE `M_name` = '$username' and `M_password` = '$password' ") or die(mysqli_error());
    $rowtogetextra = mysqli_fetch_array($sql);

    switch ($rowtogetextra['M_type'])
    {
        case "SprAdmin":
            $_SESSION['utype'] = "SprAdmin";
             break;
        case "Admin":
            $_SESSION['utype'] = "Admin";
            break;
    }



    mysqli_query($link, "UPDATE `members` SET `M_last_login`= NOW()  WHERE `M_name` = '$username' and `M_password` = '$password'") or die(mysqli_error());
    mysqli_query($link, "UPDATE `members` SET `ourlock`= 1  WHERE `M_name` = '$username' and `M_password` = '$password'") or die(mysqli_error());
    header("location:info.php");
} else {

    $SGIDUS = 0;
    header("location:index.php?TT=" . $SGIDUS . "");
}

?>
