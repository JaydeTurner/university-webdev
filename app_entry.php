<?php
// ----INCLUDE APIS------------------------------------
include ("api/api.inc.php");

// ----BUSINESS LOGIC---------------------------------
// Start up a PHP Session for this user.
session_start();

// Sets our temporary myname to the value returned when we request myname
// If myname doesnt exist, then tmyname will be blank
$tmyname = $_REQUEST["myname"] ?? "";

$tlogintoken = $_SESSION["myuser"] ?? "";

if (empty($tlogintoken) && ! empty($tmyname))
{
    $_SESSION["myuser"] = processRequest($tmyname);
    $_SESSION["entered"] = true;
    header("Location: index.php");
}
else
{
    $terror = "app_error.php";
    header("Location: {$terror}");
}

?>