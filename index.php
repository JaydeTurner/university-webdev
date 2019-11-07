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

		<div class="card text-white bg-danger my-4 text-center">
			<div class="card-body">
				<p class="text-white m-0">Leave a review for your favorite game
					today!</p>
			</div>
		</div>

		<!-- Content Row -->
		<div class="row">

			<div class="col-md-4 mb-5">

				<div class="card h-100">
					<div class="card-body">
						<h2 class="card-title">Featured Games</h2>
						<p class="card-text">
						
						
						<div id="carouselExampleIndicators" class="carousel slide"
							data-ride="carousel">
							<ol class="carousel-indicators">
								<li data-target="#carouselExampleIndicators" data-slide-to="0"
									class="active"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
								<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
							</ol>

							<div class="carousel-inner">
								<div class="carousel-item active">
									<img class="img-fluid rounded mb-4 mb-lg-0"
										src="img/gametitles/BOTW_720.jpg" alt="Breath Of The Wild">
								</div>
								<div class="carousel-item">
									<img class="img-fluid rounded mb-4 mb-lg-0"
										src="img/gametitles/MC_720.png" alt="Minecraft">
								</div>
								<div class="carousel-item">
									<img class="img-fluid rounded mb-4 mb-lg-0"
										src="img/gametitles/MK8_720.jpg" alt="Mario Kart 8">
								</div>
							</div>

							<a class="carousel-control-prev"
								href="#carouselExampleIndicators" role="button"
								data-slide="prev"> <span class="carousel-control-prev-icon"
								aria-hidden="true"></span> <span class="sr-only">Previous</span>
							</a> <a class="carousel-control-next"
								href="#carouselExampleIndicators" role="button"
								data-slide="next"> <span class="carousel-control-next-icon"
								aria-hidden="true"></span> <span class="sr-only">Next</span>
							</a>
						</div>


					</div>
				</div>
			</div>

        

			<div class="col-md-8 mb-5">
				<div class="card h-100">
					<div class="card-body">
						<h2 class="card-title">Console Information</h2>
						<p class="card-text">
					        
                  <div class="card text-white bg-danger  text-center">
            				<iframe  src="https://www.youtube.com/embed/3c6MWsEE884" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            			
            		</div>
						
					</div>
            
				</div>
    
			</div>
            {$tgamehtml}
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
$tindexpage->setDynamic2($tpagecontent);
$tindexpage->renderPage();
?>