<?php
session_start();
if (session_id() == "") {
    echo "Nothing works!";
    exit();
}
ob_start();

date_default_timezone_set("Africa/Khartoum");

if (isset($_SESSION['suser_name']))
    $suser_name = $_SESSION['suser_name'];
if (isset($_SESSION['utype']))
    $stype = $_SESSION['utype'];

////$today = date("d/m/y",$today); in this convert !
$hostname = '127.0.0.1';
$dbusername = 'root';             // Your old database username.
//$dbpassword = 'rootroot';
$dbpassword = 'oracleoracle';
//$dbpassword = 'HellFallAbdb';                 // Your old database password. If your database has no password, leave it empty.
$dbname = 'hellfadblight';                 // Your old database name.
$today = date("Y-m-d");
$todayClock = date("H:i:s");

//here to set the date , with the correct format
//$today = "2017-12-14";

list($Tyear, $Tmonth, $Tday) = explode("-", $today);
list($Thour, $Tmin, $Tsec) = explode(":", $todayClock);


$link = new mysqli("$hostname", "$dbusername", "$dbpassword", "$dbname");
if (mysqli_connect_errno()) {
    die("MySQL connection failed: " . mysqli_connect_error());
}

mysqli_query($link, "SET NAMES utf8");

// Global company name variable
$company_name = "Product Management System";

$main1 = "false";
$main2 = "false";
$main3 = "false";
$main4 = "false";
$main5 = "false";
$main6 = "false";
$main7 = "false";
$main8 = "false";
$main9 = "false";
$main10 = "false";
$main11 = "false";

$active01 = "block text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 px-3 py-2 rounded-md transition";
$active02 = "block text-sm text-gray-700 hover:bg-blue-50 hover:text-blue-600 px-3 py-2 rounded-md transition";
$active1 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active2 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active3 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active4 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active5 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active6 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active7 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active8 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active9 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active10 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active11 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active12 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active13 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active14 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active15 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active16 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active17 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active18 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active19 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active20 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active21 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active22 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active23 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active24 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active25 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active26 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active27 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active28 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active29 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active30 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active31 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active32 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active33 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active34 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active35 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active36 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
$active37 = 'text-gray-600 hover:text-blue-600 hover:bg-blue-50';
 ?>