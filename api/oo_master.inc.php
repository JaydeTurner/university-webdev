<?php

// Include our HTML Page Class
require_once ("oo_page.inc.php");

class MasterPage
{

    // -------FIELD MEMBERS----------------------------------------
    private $_htmlpage;

    // Holds our Custom Instance of an HTML Page
    private $_dynamic_1;

    // Field Representing our Dynamic Content #1
    private $_dynamic_2;

    // Field Representing our Dynamic Content #2
    private $_dynamic_3;

    // Field representing Dynamic content #3

    // -------CONSTRUCTORS-----------------------------------------
    function __construct($ptitle)
    {
        $this->_htmlpage = new HTMLPage($ptitle);
        $this->setPageDefaults();
        $this->setDynamicDefaults();
    }

    // -------GETTER/SETTER FUNCTIONS------------------------------
    public function getDynamic1()
    {
        return $this->_dynamic_1;
    }

    public function getDynamic2()
    {
        return $this->_dynamic_2;
    }

    public function getDynamic3()
    {
        return $this->_dynamic_3;
    }

    public function setDynamic1($phtml)
    {
        $this->_dynamic_1 = $phtml;
    }

    public function setDynamic2($phtml)
    {
        $this->_dynamic_2 = $phtml;
    }

    public function setDynamic3($phtml)
    {
        $this->_dynamic_3 = $phtml;
    }

    // -------PUBLIC FUNCTIONS-------------------------------------
    public function createPage()
    {
        // Create our Dynamic Injected Master Page
        $this->setMasterContent();
        // Return the HTML Page..
        return $this->_htmlpage->createPage();
    }

    public function renderPage()
    {
        // Create our Dynamic Injected Master Page
        $this->setMasterContent();
        // Echo the page immediately.
        $this->_htmlpage->renderPage();
    }

    public function addCSSFile($pcssfile)
    {
        $this->_htmlpage->addCSSFile($pcssfile);
    }

    public function addScriptFile($pjsfile)
    {
        $this->_htmlpage->addScriptFile($pjsfile);
    }

    // -------PRIVATE FUNCTIONS-----------------------------------
    private function setPageDefaults()
    {
        $this->_htmlpage->setMediaDirectory("css", "js", "fonts", "img", "data");
        $this->addCSSFile("bootstrap.css");
        $this->addCSSFile("site.css");
        $this->addScriptFile("jquery-2.2.4.js");
        $this->addScriptFile("bootstrap.js");
        $this->addScriptFile("holder.js");
    }

    private function setDynamicDefaults()
    { // WCO stands for [W]ebsite and [C]onsole [O]verview
        $this->_dynamic_1 = <<< WCO
  


		<div class="row align-items-center my-5">
			<div class="col-lg-7">
				<img class="img-fluid rounded mb-4 mb-lg-0" src="img/CNSL_600.JPG"
					alt="">
			</div>

			<div class="col-lg-5">
				<h1 class="font-weight-light">Nintendo Switch</h1>
				<p>
					Thats Right. Nintendo Switch. The most versatile console
					that functions as a handheld as well as a home console that was
					released in the year 2017. <br> <br> This small space on the
					internet is a mighty fine location to compare, read or write user
					experiences for some of the top games on the system, as well as the
					system itself**!
                    <br><br><br>
                    ** - Coming Soon
				</p>
				<a class="btn btn-danger" href="#">Leave A Review!</a>
			</div>

		
WCO;
        $this->_dynamic_2 = "";
        $this->_dynamic_3 = "";
    }

    private function setMasterContent()
    {

        // ----------------------LOGIN LOGIC------------------------------
        session_start();
        $tlogin = "app_entry.php";
        $tlogout = "app_exit.php";
        $tentryhtml = <<<FORM
    
        <form id="signin" action="{$tlogin}" method="post"
        <class="navbar-form navbar-right" role="form">
        <small>Log In:</small>
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="glyphicon glyphicon-user"></i>
                </span>
                <input id="email" type="email" class="form-control"
                        name="myname" value="" placeholder="Input Email">

                </div>

                 <input id="password" type="password" class="form-control"
                        name="mypassword" value="" placeholder="Password">
                    
                <button type="submit" class="btn btn-danger btn-outline-white">Enter</button>
        </form>
FORM;
        $texithtml = <<<EXIT
            <a class="btn btn-danger btn-outline-white"
            href="{$tlogout}?action=exit">Log Out</a>
EXIT;

        // If our session is set, show login form, if not show log out button.
        $tauth = isset($_SESSION["myuser"]) ? $texithtml : $tentryhtml;

        // ---------------END OF LOGIN LOGIC-----------------------------------------

        // This line of code will set our variable to either a visitors username, or just guest
        $tusrdisplay = isset($_SESSION["myuser"]) ? $_SESSION["myuser"] : "Guest";

        $tcurryear = date("Y");
        $tmasterpage = <<<MASTER
<div class="container">
	<div class="header clearfix">
		<nav class="navbar navbar-expand-lg navbar-dark bg-danger fixed-top">
		<div class="container">
			<a class="navbar-brand" href="index.php">Nintendo Switch</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse"
				data-target="#navbarResponsive" aria-controls="navbarResponsive"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav xs-12">
                    <li class="nav-item"><a class="nav-link" href="#"><small>{$tusrdisplay}</small></a></li>
					<li class="nav-item active"><a class="nav-link" href="index.php">Home
							/ Console Information <span class="sr-only">(current)</span>
					</a></li>
					<li class="nav-item"><a class="nav-link" href="rankings.php">Rankings</a></li>
					<li class="nav-item"><a class="nav-link" href="games.php">Games List</a></li>


					<!-- Search Bar -->
					<li class="nav-item">
						<form class="form-inline">
							<input class="form-control mr-sm-2" type="search"
								placeholder="Search" aria-label="Search">
							<button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
						</form>
					</li>


					<!-- Dropdown Menu -->
					<li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
						aria-haspopup="true" aria-expanded="false"> Social </a>
						<div id="mydropdown" class="dropdown-menu"
							aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="chat.php">Chat</a> 
                            <a class="dropdown-item" href="datainput.php">Profile</a> 
                            {$tauth}
                            <a class="dropdown-item"  href="datainput.php">Register Here</a>
						</div>
                    </li>

                    <li> </li>

				</ul>
			</div>
		</div>
	</nav>
	</div>
	</div>
		{$this->_dynamic_1}
    
	
		{$this->_dynamic_2}


        {$this->_dynamic_3}
    
   <footer class="py-2 bg-danger">
		<div class="container">
			<p class="m-0 text-center text-white"> Jayde Turner
				Assignment Work {$tcurryear}</p>
		</div>

	</footer>
</div>        
MASTER;
        $this->_htmlpage->setBodyContent($tmasterpage);
    }
}

?>