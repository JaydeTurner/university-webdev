<?php
// Include our Website API
include ("api/api.inc.php");

// ----Page Generation----
function createPage()
{
    $tgameslist = new GameList();

    $tgamehtml = "";
    for ($tx = 0; $tx < 3; $tx ++)
    {
        $tarrayindex = rand(0, 9);
        $tgamehtml .= $tgameslist->gameItems[$tarrayindex]->getHTML();
    }

    $tcontent = <<<PAGE
<div class="container">
	<!-- Call to Action -->
        <br><br><br>
		<div class="card text-white bg-danger my-4 text-center">
			<div class="card-body">
				<p class="text-white m-0">Live Chat - Coming Soon!</p>
			</div>
		</div>

   </div>
</div>


PAGE;
    return $tcontent;
}
// ----Buisness Logic----
$tpagecontent = createPage();
// ---build page---
$tindexpage = new MasterPage("Nintendo Switch ::  Home");
$tindexpage->setDynamic1($tpagecontent);
$tindexpage->renderPage();
?>