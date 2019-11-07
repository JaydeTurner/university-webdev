<?php
include ("api/api.inc.php");

// Page Generation
function createPage()
{
    $tgameslist = new GameList();
    $tgamehtml = "";
    foreach ($tgameslist->gameItems as $tgitem)
    {
        $tgamehtml .= $tgitem->getHTML();
    }

    $tcontent = <<<PAGE
   {$tgamehtml}
PAGE;
    return $tcontent;
}

// Buisness logic
$tpagecontent = createPage();

// Build Page
$tindexpage = new MasterPage("Nintendo Switch :: Games");
$tindexpage->setDynamic1($tpagecontent);
$tindexpage->renderPage();
?>