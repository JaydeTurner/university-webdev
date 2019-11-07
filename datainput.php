<?php
// Include our Website API
include ("api/api.inc.php");

// ----Page Generation----
function createPage($pmethod, $paction, array $pform)
{
    nullAsEmpty($pform, "inputEmail");
    nullAsEmpty($pform, "inputPassword");
    nullAsEmpty($pform, "confirmPassword");
    nullAsEmpty($pform, "firstName");
    nullAsEmpty($pform, "lastName");
    nullAsEmpty($pform, "phoneNumber");
    nullAsEmpty($pform, "err-firstName");

    $tcontent = <<<INDEX
<div class="container-fluid">

<div id="formrowcontainer" class="row">


<!-- Blue Box-->
   
    
      <div id="loginbtmcol" class="col-sm-5">
        <p class="lead">New User Registration</p>
        <form class="form-horizontal" method="{$pmethod}" action="{$paction}">
		    <div class="form-group">
		        <label for="inputEmail" class="control-label col-xs-3">Email</label>
		        <div class="col-xs-9">
		            <input type="email" class="form-control" id="inputEmail" name="inputEmail" 
                      placeholder="Email" value="{$pform["inputEmail"]}">
		        </div>
		    </div>
		    <div class="form-group">
		        <label for="inputPassword" class="control-label col-xs-3">Password</label>
		        <div class="col-xs-9">
		            <input type="password" class="form-control" id="inputPassword" 
                     name="inputPassword" placeholder="Password" value="{$pform["inputPassword"]}">
		        </div>
		    </div>
            <div class="form-group">
		        <label class="control-label col-xs-3" for="confirmPassword">Confirm Password:</label>
		        <div class="col-xs-9">
		            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" 
                       placeholder="Confirm Password" value="{$pform["confirmPassword"]}">
		        </div>
		    </div>
            <div class="form-group">
                <label class="control-label col-xs-3" for="firstName">First Name:</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="firstName" name="firstName"
                    placeholder="First Name" value="{$pform["firstName"]}">
                 
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" for="lastName">Last Name:</label>
                <div class="col-xs-9">
                    <input type="text" class="form-control" id="lastName" 
                    name="lastName" placeholder="Last Name" value="{$pform["lastName"]}">
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-xs-3" for="phoneNumber">Phone:</label>
                <div class="col-xs-9">
                    <input type="tel" class="form-control" id="phoneNumber" 
                     name="phoneNumber" placeholder="Phone Number" value="{$pform["phoneNumber"]}">
                </div>
            </div>
            	    <div class="form-group">
		        <div class="col-xs-offset-3 col-xs-9">
		            <label class="checkbox-inline">
		                <input type="checkbox" value="agree" checked>  I agree to the <a href="#">Terms and Conditions</a>.
		            </label>
		        </div>
		    </div>
		    <div class="form-group">
		        <div class="col-xs-offset-3 col-xs-9">
		            <div class="checkbox">
		                <label><input type="checkbox"> Remember me</label>
		            </div>
		        </div>
		    </div>
            <div class="form-group">
		        <div class="col-xs-offset-3 col-xs-9">
		            <input type="submit" class="btn btn-primary" value="Submit">
		            <input type="reset" class="btn btn-default" value="Reset">
		        </div>
		    </div>
		</form>
      </div>
    </div>
</div>
    </div>
INDEX;
    return $tcontent;
}

function createResponse(array $pformdata)
{
    $tresponse = <<<RESPONSE
        <br><br><br>
		<section class="panel panel-danger" id="Form Response">
				<div class="jumbotron">
					<h1>Thank You {$pformdata["firstName"]} {$pformdata["lastName"]}</h1>
					<p class="lead">Your Your information has been submitted
                    and tied  to {$pformdata["inputEmail"]} </p>
				</div>
		</section>
RESPONSE;
    return $tresponse;
}

function processForm(array $pformdata): array
{
    foreach ($pformdata as $tfield => $tvalue)
    {
        $pformdata[$tfield] = processFormData($tvalue);
    }
    $tvalid = true;
    if ($tvalid && empty($pformdata["firstName"]))
    {
        $tvalid = false;
        $pformdata["err-firstName"] = "<p id=\"help-firstName\" class=\"help-block\">First Name Required</p>";
    }
    if ($tvalid && empty($pformdata["inputPassword"]))
    {
        $tvalid = false;
    }
    if ($tvalid && empty($pformdata["confirmPassword"]))
    {
        $tvalid = false;
    }
    if ($tvalid && $pformdata["confirmPassword"] != $pformdata["inputPassword"])
    {
        $tvalid = false;
    }
    if ($tvalid)
    {
        $pformdata["valid"] = true;
    }
    return $pformdata;
}
// ----Buisness Logic----
$taction = htmlspecialchars($_SERVER['PHP_SELF']);
$tmethod = "GET";
$tformdata = processForm($_REQUEST) ?? array();

if (isset($tformdata["valid"]))
{
    $tpagecontent = createResponse($tformdata);
}
else
{
    $tpagecontent = createPage($tmethod, $taction, $tformdata);
}

// ---build page---
$tindexpage = new MasterPage("Nintendo Switch ::  Home");
$tindexpage->setDynamic1($tpagecontent);
$tindexpage->renderPage();
?>