<?php
// ----INCLUDE APIS------------------------------------
include ("api/api.inc.php");

// ----PAGE GENERATION LOGIC---------------------------
function createPage()
{
    $tcontent = <<<PAGE
    <br><br><br>
    <div id="cardbody" class="container container-fluid" >
 <h1>Oh Dear! You got lost! Have no fear, click this link here!</h1>
 <p>
        <a href="index.php" class="btn btn-danger">Go Home</a>
 
</p>
        
</div>
PAGE;
    return $tcontent;
}

// ----BUSINESS LOGIC---------------------------------
// Start up a PHP Session for this user.
session_start();

// Build up our Dynamic Content Items.
$tpagetitle = "L O S T";
$tpagecontent = createPage();

// ----BUILD OUR HTML PAGE----------------------------
// Create an instance of our Page class
$tpage = new MasterPage($tpagetitle);
// Set the Three Dynamic Areas (1 and 3 have defaults)
$tpage->setDynamic1($tpagecontent);
$tpage->renderPage();
?>