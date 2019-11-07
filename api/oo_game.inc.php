<?php

class GameItem

{

    // Class Fields
    public $title;

    public $developer;

    public $releaseDate;

    public $ageRating;

    public $criticScore;

    public $externalReview;

    public $internalReview;

    public $reccomended;

    public $retalLink;

    public $retalLinkTxt;

    public $usrScore;

    public $ranking;

    public $imgdir;

    // Constructors
    // Setting the defaults for my Game Item
    public function __construct($gtitle = "Default Title", $gdeveloper = "Default Developer", $greleasedate = "01/01/1900", $gageRating = "U", $gcriticScore = "80", $gexternalReview = "Default Internal Review", $ginternalReview = "Default Internal Review", $greccomended = TRUE, $gretailLink = "#", $gretailLinkTxt = "Default Link", $guserScore = "70", $granking = "0", $gimgdir = "img/def_720.png")
    {
        $this->title = $gtitle;
        $this->developer = $gdeveloper;
        $this->releaseDate = $greleasedate;
        $this->ageRating = $gageRating;
        $this->criticScore = $gcriticScore;
        $this->externalReview = $gexternalReview;
        $this->internalReview = $ginternalReview;
        $this->reccomended = $greccomended;
        $this->retailLink = $gretailLink;
        $this->retailLinkTxt = $gretailLinkTxt;
        $this->userScore = $guserScore;
        $this->ranking = $granking;
        $this->imgdir = $gimgdir;
    }

    // Methods
    public function getHTML()
    {
        $gameItem = <<<GI
        
        	<br> <br> <br>
	<div id="content" class="container alert alert-info">
		<!-- Content Row -->
        <h5>{$this->title}</h5>
		<div id="gameinfo" class="row">
           
		
			<div id="g_img" class="col-sm">
			<img src="{$this->imgdir}" class="img-fluid" alt="Game Title Image">
			</div>
			
			<div id="g_meta" class="col-sm">
            <h6>Additional Consumer Information:</h6>
			 <ul>
                  <li>Developer: {$this->developer}</li>
                  <li>Release Date: {$this->releaseDate}</li>
                  <li>Age Rating: {$this->ageRating}</li>
                  <li>Critic Score: {$this->criticScore}</li>
                  <li>Recommended : {$this->reccomended}</li>
                  <li><a href="{$this->retailLink}">{$this->retailLinkTxt}</a></li>
                  <li>User Score: {$this->userScore} </li>
                  <li>Ranking: {$this->ranking}</li>
             </ul> 
			</div>
			
			<div id ="g_usrreview" class="col-sm">
            <h6>User Reviews:</h6>
			 <ul>
                  <li>{$this->externalReview}</li>
                  <li>List Of Reviews</li>
                  <li>List Of Reviews</li>
                  <li>List Of Reviews</li>
                  <li>List Of Reviews</li>
                  <li>List Of Reviews</li>
                  <li>List Of Reviews</li>
                  <li>List Of Reviews</li>
             </ul> 
			
			</div>
			
		</div>
		<div id="editorialinfo" class="row">
			<div id="g_wmreview" class="col-sm">
			
			<h1>Editorial Review: </h1>
			
			<p>
	       {$this->internalReview}
			</p>
			
			</div>
		</div>
	</div>




GI;

        return $gameItem;
    }
}

class GameList
{

    public $gameItems = array();

    public function __construct()
    {
        $this->gameItems[] = new GameItem("Ledgend of Zelda: Breath of the Wild", "Nintendo", "03/03/2017", "E+", "4", "I thought this game was great, it looks stunning!", "Breath of the wild is a new breath of life in the zelda series, providing engaging and excellently scaling gameplay. for the newbie and old school gamers alike!", "YES", "https://www.game.co.uk/en/games/breath-of-the-wild/", "Buy NOW from GAME", "5", "1", "img/gametitles/BOTW_720.jpg");
        $this->gameItems[] = new GameItem("Super Mario Odyssey", "Nintendo", "27/10/2017", "E10+", "3", "This game was great although I struggled with getting past the tutorial level", "Super Mario Odyssey is an excellent entry to the mario series. It starts with a dinosaur level in which you play a T-Rex. 'Nuff said.", "YES", "https://www.amazon.co.uk/Super-Mario-Odyssey-Nintendo-Switch/dp/B01MUA0D2A?th=1", "Buy NOW from Amazon", "4", "2", "img/gametitles/SMO_720.jpg");
        $this->gameItems[] = new GameItem("Super Mario Tennis Aces", "Nintendo", "22.06/2018", "E", "2", "I bought this game on release and the best thing about it was the multiplayer, its just a shame that you have to interact with other people to play", "Mario tennis aces is a good showcase for the switches potential as a platform that can provide an excellent multiplayer service. The character selection leaves some to be desired however, after playing Super Smash Brothers.", "YES", "https://www.game.co.uk/en/mario-tennis-aces-2023249", "Buy NOW from GAME", "3", "7", "img/gametitles/MTA_720.jpg");
        $this->gameItems[] = new GameItem("Super Mario Party", "Nintendo", "05/10/2018", "E", "3", "Super mario party is a great way to start the day, me and my friends have a game for breakfast every morning!", "Super Mario Party is the switches iteration of the infamous mario party series. Our own game player conducted an experiment during gameplay for the review and luigi is still capable of winning by doing nothing! Great Game!", "Yes", "https://www.amazon.co.uk/Super-Mario-Party-Nintendo-Switch/dp/B07DTNGK5V?th=1", "Buy NOW from Amazon", "2", "6", "img/gametitles/SMP_720.jpg");
        $this->gameItems[] = new GameItem("Tetris 99", "Akira", "13/02/2019", "E", "4", "Tetris is awesoem!1!!1!!", "Tetris 99 Combines battle royale gameplay with that classic tetris experience and is excellent as a result. Aiming for and acheiving a 1st place is worth the investment.", "YES", "https://www.nintendo.com/games/detail/tetris-99-switch/", "Download for FREE", "5", "3", "img/gametitles/T99_720.jpg");
        $this->gameItems[] = new GameItem("Minecraft", "Mojang", "13/10/2015", "13+", "3", "My children love this game!", "Minecraft switch is the same minecraft we all know and love, now portable on the switch!", "YES", "https://www.smythstoys.com/uk/en-gb/video-games-and-tablets/nintendo-gaming/nintendo-switch/nintendo-switch-games/minecraft-nintendo-switch/p/168112", "Buy NOW from Smyths", "1", "8", "img/gametitles/MC_720.png");
        $this->gameItems[] = new GameItem("Splatoon 2", "Nintendo EPD", "21/07/2017", "13+", "1", "I bought this game expecting fun multiplayer action and all I got was a paperweight", "Splatoon 2 is definitley a game, altough it leaves a lot to be desired in regards to having fun. If your hoping to a callback to the old days of area shooting with a soft touch, your going to be dissapointed.", "NO", "https://www.game.co.uk/en/splatoon-2-1712331", "Buy NOW from GAME", "1", "10", "img/gametitles/S2_720.jpg");
        $this->gameItems[] = new GameItem("Super Mario Maker", "Nintendo", "28/06/2019", "E", "4", "The community of this game is incredible!", "Liked Super Mario Maker? Ready for more difficult user made maps that will test your patience more than BoTW Master Mode? You're in the right place!", "YES", "https://www.game.co.uk/en/super-mario-maker-2-with-game-exclusive-pre-order-bundles-2579724", "Buy NOW from GAME", "4", "4", "img/gametitles/SMM2_720.jpg");
        $this->gameItems[] = new GameItem("Super Smash Bro's Ultimate", "Nintendo", "07/12/2018", "13+", "4", "This makes a Great party game!", "This game is a really great entry to the series, although the new things it brings are not many, and the old re used things are many. Excellent game none the less and will liven up any party", "YES", "https://www.game.co.uk/en/super-smash-bros-ultimate-2329878", "Buy NOW from Game", "3", "5", "img/gametitles/SSBU_720.jpg");
        $this->gameItems[] = new GameItem("Mario Kart 8", "Nintendo", "28/04/2017", "E", "3", "This game is great although difficult!", "Mario Kart 8 advanced the modern formula of mario kart with a pretty bow, and is a fun multiplayer game and can be punishing at times. Makes me as a player long for the old era of the game", "YES", "https://www.amazon.co.uk/Mario-Kart-Deluxe-Nintendo-Switch/dp/B01N1081RO", "Buy NOW from Amazon", "3", "9", "img/gametitles/MK8_720.jpg");
    }
}
?>