<?php
// Include our Website API
include ("api/api.inc.php");

// ----Page Generation----
function createPage()
{
    // The plan for this ranking page was to scrape the scores from metacritic
    // to be able to display the live ranking of games on metacritic, and also
    // from my own content.
    $tgameslist = new GameList();

    $tcontent = <<<PAGE
		<div id="rankingtable" class="row">
        
			<div id="gameinfo" class="col-md-6">

				<div class="card text-white bg-info h-100">
					<div id="cardbody" class="card-body">
						<h2 class="card-title">Metacritic Scores</h2>
						<p class="card-text"> </p>
						
								
						<table id="rankingtable" class="table  table-info" style="width: 100%" >
							<tr>
								<th>Game Title</th>
								<th>Score</th>
							</tr>
							<tr>
								<td>{$tgameslist->gameItems[0]->title}</td>
								<td>97/100</td>

							</tr>
							<tr>
								<td>{$tgameslist->gameItems[1]->title}</td>
								<td>97/100</td>
							</tr>

							<tr>
							<td>{$tgameslist->gameItems[4]->title}</td>
								<td>83/100</td>

							</tr>
							<tr>
								<td>{$tgameslist->gameItems[7]->title}</td>
								<td>88/100</td>
							</tr>
							<tr>
							<td>{$tgameslist->gameItems[8]->title}</td>
								<td>93/100</td>
							</tr>

                            <tr>
							<td>{$tgameslist->gameItems[03]->title}</td>
								<td>76/100</td>
							</tr>
    
                            <tr>
							<td>{$tgameslist->gameItems[2]->title}</td>
								<td>75/100</td>
							</tr>

                        <tr>
							<td>{$tgameslist->gameItems[5]->title}</td>
								<td>86/100</td>
							</tr>

                        <tr>
							<td>{$tgameslist->gameItems[9]->title}</td>
								<td>92/100</td>
							</tr>

                        <tr>
							<td>{$tgameslist->gameItems[6]->title}</td>
								<td>82/100</td>
							</tr>

						</table>


					</div>
				</div>
			</div>

			<div id="gameinfo" class="col-md-6 ">
				<div class="card text-white bg-danger h-100">
					<div id="cardbody" class="card-body">
						<h2 class="card-title">Our Rankings</h2>
						<p class="card-text">
						
						
						<table id="rankingtable" class="table table-info"style="width: 100%">
							<tr>
								<th>Game Title</th>
								<th>Ranking</th>
							</tr>
									<tr>
								<td>{$tgameslist->gameItems[0]->title}</td>
								<td>{$tgameslist->gameItems[0]->ranking}</td>

							</tr>
							<tr>
								<td>{$tgameslist->gameItems[1]->title}</td>
								<td>{$tgameslist->gameItems[1]->ranking}</td>
							</tr>

							<tr>
							    <td>{$tgameslist->gameItems[4]->title}</td>
								<td>{$tgameslist->gameItems[4]->ranking}</td>

							</tr>
							<tr>
								<td>{$tgameslist->gameItems[7]->title}</td>
								<td>{$tgameslist->gameItems[7]->ranking}</td>
							</tr>
							<tr>
							<td>{$tgameslist->gameItems[8]->title}</td>
								<td>{$tgameslist->gameItems[8]->ranking}</td>
							</tr>

                            <tr>
							<td>{$tgameslist->gameItems[3]->title}</td>
								<td>{$tgameslist->gameItems[3]->ranking}</td>
							</tr>
    
                            <tr>
							<td>{$tgameslist->gameItems[2]->title}</td>
								<td>{$tgameslist->gameItems[2]->ranking}</td>
							</tr>

                        <tr>
							<td>{$tgameslist->gameItems[5]->title}</td>
								<td>{$tgameslist->gameItems[5]->ranking}</td>
							</tr>

                        <tr>
							<td>{$tgameslist->gameItems[9]->title}</td>
								<td>{$tgameslist->gameItems[9]->ranking}</td>
							</tr>

                        <tr>
							<td>{$tgameslist->gameItems[6]->title}</td>
                            <td>{$tgameslist->gameItems[6]->ranking}</td>
							</tr>
						</table>


					</div>
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
$tindexpage = new MasterPage("Nintendo Switch ::  Rankings");
$tindexpage->setDynamic1($tpagecontent);
$tindexpage->renderPage();
?>