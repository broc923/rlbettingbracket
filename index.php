<?php

/*

Example usage of SteamAuth
Uses: handlers, login, SteamID, POST Logout

*/

include("SteamAuth/SteamAuth.class.php");
include("connectDB.php");


$auth = new SteamAuth();

// You can use this to do other checks on the person, such as making an account in a database
$auth->SetOnLoginCallback(function($steamid){
	return true; // returning true will log them in, false will stop the login (you should put an error message in that case)
});

// This handler is for when a login fails Ex: canceled, auth failed, exploit attempt, etc
$auth->SetOnLoginFailedCallback(function(){
	return true;
});

// You can use this to do other checks on the person, such as making an modifying a database
$auth->SetOnLogoutCallback(function($steamid){
	return true; 
});

// Always call Init() on pages you want to check a login from.  Call this AFTER you set handlers!
$auth->Init();

// Where we handle the POST logout from the form below
if(isset($_POST['logout'])){
	$auth->Logout(); // The logout function also refreshes the page
}
$stmt3 = $conn->prepare("SELECT * FROM teams");
$stmt3->execute();
$result3 = $stmt3->setFetchMode(PDO::FETCH_ASSOC);
$result3 = $stmt3->fetch();
if($auth->IsUserLoggedIn()){
	$id = $auth->SteamID;
	$stmt2 = $conn->prepare("SELECT COUNT(ID) FROM brackets WHERE SteamID = '$id'");
	$stmt2->execute();
	$result2 = $stmt2->fetchColumn();
}
?>
<!DOCTYPE html>
<html >
<head>
<?php //echo include_once (dirname(__FILE__) . '/adblock.php'); ?>
	<meta charset="UTF-8">
	<!--<meta name="propeller" content="05359f4778a1165e23823728cf268214" />-->
	<title>Rocket League Bracket Betting</title>
	<link rel="stylesheet" href="css/style.css">
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/normalize/4.2.0/normalize.min.css'>
	<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/typicons/2.0.8/typicons.min.css'>
	<script src="js/bracket.js"></script>
	<!--<script type="text/javascript" src="//go.oclaserver.com/apu.php?zoneid=911057"></script>-->
	<style>
	.path {
  stroke-dasharray: 1000;
  stroke-dashoffset: 1000;
  animation: dash 5s linear alternate infinite;
}

@keyframes dash {
  from {
    stroke-dashoffset: 1000;
  }
  to {
    stroke-dashoffset: 0;
  }
}
	</style>
</head>
<body>
<!-- Header -->
<header id="home">
  <div class="main_nav">
    <div class="container">
      <div class="mobile-toggle"> <span></span> <span></span> <span></span> </div>
      <nav>
        <ul>
          <li><a class="smoothscroll" href="#home">Home</a></li>
          <li><a class="smoothscroll" href="#about">About</a></li>
          <li><a class="smoothscroll" href="#brackets">Live Bracket</a></li>
          <li><a class="smoothscroll" href="#contact">Contact</a></li>
          <?php
			  
			  //Check if user is logged in
			if($auth->IsUserLoggedIn()){

				// Display your content here~

				// Display SteamID
				//echo "Your SteamID is " . $auth->SteamID . "<br/>";

				// We use POST to logout so people can't embed images to the logout function and annoy people.
				echo "<li><form method=\"POST\"><input type=\"submit\" name=\"logout\" value=\"Logout\" /></form></li>";

			}else{

				// Display login button
				echo "<li><a href=\"" . $auth->GetLoginURL() . "\"><img style=\"position: fixed; top: 10px; right: 10px; border: 0;\" src=\"assets/sits_large_noborder.png\" alt=\"Sign in through Steam\" /></a></li>";
			}
		  ?>
        </ul>
		<br />
		<br />
      </nav>
    </div>
  </div>
  <center>
  <div class="title">
    <!--<div><span class="typcn typcn-social-dribbble icon heading"></span></div>-->
    <div class="smallsep heading"></div>
    <h1 class="heading"> Rocket League</h1>
    <h2 class="heading">Tournament Bracket betting made easy</h2>
	<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="512px" height="512px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">

  <path class="path" fill="none" stroke="#FFFFFF" stroke-width="4" stroke-miterlimit="10" d="M405.808,81.88c26.389,22.628,47.566,51.358,61.298,83.305c24.077,55.303,24.884,120.201,2.299,176.12
		c-25.569,64.954-82.47,116.608-149.717,135.488c-55.443,16.101-116.99,10.373-168.283-16.229
		c-42.738-21.793-78.298-57.325-100.014-100.111c-33.057-63.492-33.417-142.625-1.258-206.532
		c16.914-34.125,42.477-63.916,73.645-85.794c52.057-37.235,120.159-50.537,182.49-36.316
		C342.946,39.794,377.439,57.344,405.808,81.88 M220.262,53.695c6.385,6.583,12.537,13.414,19.112,19.806
		c29.381,4.56,58.741,9.341,88.134,13.718c8.401-3.932,16.511-8.465,24.849-12.531C312.399,52.946,264.98,45.847,220.262,53.695
		 M438.036,160.864c-4.009,7.559-7.735,15.26-11.73,22.818c-1.244,1.684-0.36,3.755-0.148,5.608
		c4.342,27.874,8.712,55.749,13.054,83.622c5.636,6.796,12.784,12.53,19.035,18.88C466.321,247.541,459.109,200.617,438.036,160.864
		 M324.017,96.836c-28.087-4.469-56.194-8.846-84.309-13.188c-11.045,21.695-22.061,43.417-32.832,65.245
		c5.756,15.656,11.583,31.296,17.445,46.917c24.417,3.825,48.818,7.764,73.249,11.504c12.784-12.516,25.371-25.244,37.992-37.922
		C331.787,145.195,327.969,120.997,324.017,96.836 M415.184,188.016c-24.155-3.987-48.346-7.784-72.549-11.511
		c-12.722,12.537-25.315,25.229-37.923,37.88c3.755,24.472,7.7,48.91,11.61,73.355c15.741,5.643,31.275,11.871,47.086,17.345
		c21.701-10.868,43.396-21.771,65.005-32.803C424.037,244.19,419.744,216.082,415.184,188.016 M127.617,145.605
		c-13.604,23.787-26.919,47.751-40.284,71.666c17.338,17.423,34.571,34.952,52.05,52.221c13.965-1.11,27.952-1.889,41.911-3.077
		c11.342-22.118,22.634-44.271,33.828-66.468c-5.756-15.5-11.88-30.872-17.762-46.33
		C174.152,150.675,150.86,148.299,127.617,145.605 M311.904,296.841c-22.119,11.215-44.236,22.458-66.306,33.778
		c-1.308,13.951-1.924,27.96-3.14,41.917c17.041,17.607,34.26,35.053,51.513,52.447c25.166-12.594,50.261-25.301,75.363-38.015
		c-3.443-24.049-7.135-48.076-10.755-72.104C343.094,308.699,327.531,302.653,311.904,296.841 M114.663,106.983
		c-33.39,31.452-55.677,74.444-61.964,119.89c8.301-4.299,16.814-8.272,24.968-12.805c13.944-24.961,28.178-49.801,41.839-74.904
		C118.022,128.415,116.318,117.702,114.663,106.983 M375.543,395.1c-25.484,12.686-50.855,25.64-76.304,38.403
		c-1.16,0.637-2.616,1.089-3.161,2.438c-4.017,7.878-8.068,15.733-12.085,23.611c45.086-6.096,87.915-27.727,119.438-60.551
		C394.147,397.653,384.877,396.048,375.543,395.1 M182.517,276.391c-14.008,0.898-28.016,1.781-42.002,2.941
		c-11.165,21.715-22.302,43.445-33.397,65.203c19.876,19.933,39.542,40.093,59.63,59.813c21.786-10.953,43.551-21.942,65.294-32.979
		c1.238-14.008,2.538-28.009,3.542-42.037C217.859,311.719,200.322,293.914,182.517,276.391 M71.233,345.773
		c19.756,40.757,53.414,74.5,94.009,94.547c-1.484-9.235-2.468-18.618-4.475-27.712c-20.705-20.789-41.303-41.712-62.163-62.331
		C89.553,348.425,80.361,347.236,71.233,345.773z"/>
  
</svg>
    <a class="smoothscroll" href="#about">
		<div class="mouse">
		  <div class="wheel"></div>
		</div>
    </a> 
  </div>
  </center>
  <a class="smoothscroll" href="#about">
	<div class="scroll-down"></div>
  </a> 
</header>
<!-- About Section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->  
  
<section id="about">
  <div class="container">
    <div class="row">
      <h1>About</h1>
      <div class="block"></div>
      <p>This site is ran by fellow Rocket League players who simply wanted to offer the community a totally free bracket system for competitive tournaments. At the very least we hope to offer more incentive to stick around and watch the gods of Rocket League perform their magic since now you can earn rewards!</p>
    </div>
    <div class="row">
      <div class="six columns">
        <h3><span class="typcn typcn-tick-outline icon"></span>Free? How!?</h3>
        <p>The original thought was to charge per bracket submission, but that simply is no fun! We of course will accept donations via this link: <a href="https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=WZF3CMTKK7HQG">LINK</a> as well as direct Rocket League item donations! WIthout the community support, there is only so much I can give out of my own pocket.</p>
      </div>
      <div class="six columns">
        <h3><span class="typcn typcn-media-play-outline icon"></span>How do I start?</h3>
        <p>Navigate to the Bracket section and you'll be confronted with the current teams playing! Simply click the winner in each matchup! Choose wisely, you can only submit one bracket per tournament! After the tournament is over rewards (Rocket League keys/items) will be given out to the top guessers! This means you don't have to get them all right, you simply need to get more right than everyone else. Multiple people will win each time!</p>
      </div>
	  </div>
	  <div class="row">
	  <div class="six columns">
        <h3><span class="typcn typcn-media-play-outline icon"></span>How are winners decided?</h3>
        <p>Winners are decided by whoever has the highest number of winning teams guessed. So if you guessed 6 out of 14 of the matches correctly and you were the highest correct guesses, you'd win. If more than one person gets the exact same number of correct guesses, you'll split the reward!</p>
      </div>
	  <div class="six columns">
        <h3><span class="typcn typcn-media-play-outline icon"></span>How do I help?</h3>
        <p>Donate keys or disable Adblock! We need more keys to give back to the community, without your help our giveaways are limited to what I can scrounge together out of pocket! Hopefully we'll be approved for adsense soon meaning the ad money will help. Check out the Contact page at the bottom! You'll be featured on the statistics section after the first tournament!</p>
      </div>
	  </div>
    </div>
  </div>
</section>

<!-- Stats Section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->  

<section id="stats">
  <div class="container">
    <div class="row">
      <h1>Statistics</h1>
      <div class="block"></div>
      <p>Here is where you can see the boring stats most people don't really care about. For those of you interested like us, check them out below!</p>
    </div>
    <div class="row">
      <?php 
		  $stmt4 = $conn->prepare("SELECT COUNT(ID) FROM brackets");
		  $stmt4->execute();
		  $result4 = $stmt4->fetchColumn();
		  echo 'Total Brackets: '.$result4;
	  ?>
    </div>
  </div>
</section>

<!-- Brackets Section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->  

<section id="brackets">
  <div class="container">
    <h1>Live Bracket</h1>
	<div class="row">
      <div class="one-third column">
        <h3>Tournament Info</h3>
		<p>Rocket League Championship Series<br/>December 3-4<br /><a href="https://www.rocketleagueesports.com/">Rocket League Esports</a></p>
      </div>
	  <?php
	  if($auth->IsUserLoggedIn()){
		  if ($result2 <= 0) {
	  echo '<div class="two-thirds column">
        <h5 onclick="reset()"><button type="button">Reset Bracket</button></h5>
      </div>
	  <div class="two-thirds column">
        <h5 onclick="submit(\''.$auth->SteamID.'\')"><button type="button">Submit Bracket</button></h5>
      </div>';
		  }
	  }
	  ?>
    </div>
	<div class="block"></div>
  </div>
  <?php
	if($auth->IsUserLoggedIn()){
		
		//bracket html below
		if ($result2 <= 0) {
			
		echo '
		<!-- Round 1 Upper Game 1 -->
  <div class="tournament-bracket tournament-bracket--rounded">                                                     
    <div class="tournament-bracket__round tournament-bracket__round--quarterfinals">
      <h2 class="tournament-bracket__round-title">Round 1</h2>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <!--<tr class="tournament-bracket__team tournament-bracket__team--winner">-->
                <tr class="tournament-bracket__team" onclick="selected1()" id="team1">
                  <td class="tournament-bracket__country"">
                    <abbr class="tournament-bracket__code" title="'.$result3["team1"].'" id="team1Name">'.$result3["team1"].'</abbr>
                  </td> 
                </tr>
                <tr class="tournament-bracket__team" onclick="selected2()" id="team2">
                  <td class="tournament-bracket__country"">
                    <abbr class="tournament-bracket__code" title="'.$result3["team2"].'" id="team2Name">'.$result3["team2"].'</abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
		
		<!-- Round 1 Upper Game 2 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selected3()" id="team3">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team3"].'" id="team3Name">'.$result3["team3"].'</abbr>
                  </td>

                </tr>
                <tr class="tournament-bracket__team" onclick="selected4()" id="team4">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team4"].'" id="team4Name">'.$result3["team4"].'</abbr>
                  </td>

                </tr>
              </tbody>
            </table>
          </div>
        </li>
		
		<!-- Round 1 Upper Game 3 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selected5()" id="team5">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team5"].'" id="team5Name">'.$result3["team5"].'</abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selected6()" id="team6">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team6"].'" id="team6Name">'.$result3["team6"].'</abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>

		<!-- Round 1 Upper Game 4 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selected7()" id="team7">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team7"].'" id="team7Name">'.$result3["team7"].'</abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selected8()" id="team8">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team8"].'" id="team8Name">'.$result3["team8"].'</abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!-- Round 2 Upper Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--semifinals">
      <h3 class="tournament-bracket__round-title">Round 2</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selectedRound2Team1()" id="team1Round2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name2"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selectedRound2Team2()" id="team2Round2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name2"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>

		<!-- Round 2 Upper Game 2 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selectedRound2Team3()" id="team3Round2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team3Name2"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selectedRound2Team4()" id="team4Round2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team4Name2"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!--Semifinals Upper Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--bronze">
      <h3 class="tournament-bracket__round-title">Semifinals</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 4th, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selectedRound3Team1()" id="team1Round3">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name3"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selectedRound3Team2()" id="team2Round3">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name3"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!--Finals Upper Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--gold">
      <h3 class="tournament-bracket__round-title">Finals</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 4th, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selectedRound4Team1()" id="team1Round4">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name4"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selectedRound4Team2()" id="team2Round4">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name4"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
  </div>
  
  <br /> <br />
  <hr/>
  
  <!--Round 1 Lower Game 1 -->
  <div class="tournament-bracket tournament-bracket--rounded">                                                     
    <div class="tournament-bracket__round tournament-bracket__round--quarterfinals">
      <h2 class="tournament-bracket__round-title">Lower Round 1</h2>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <!--<tr class="tournament-bracket__team tournament-bracket__team--winner">-->
                <tr class="tournament-bracket__team" onclick="selectedRound1Team1Lower()" id="lower1Team1">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name1Lower"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selectedRound1Team2Lower()" id="lower1Team2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name1Lower"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
		
		<!--Round 1 Lower Game 2 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selectedRound1Team3Lower()" id="lower1Team3">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team3Name1Lower"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selectedRound1Team4Lower()" id="lower1Team4">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team4Name1Lower"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!--Round 2 Lower Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--semifinals">
      <h3 class="tournament-bracket__round-title">Lower Round 2</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selectedRound2Team1Lower()" id="lower2Team1">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name2Lower"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selectedRound2Team2Lower()" id="lower2Team2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name2Lower"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
		
		<!--Round 2 Lower Game 2 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selectedRound2Team3Lower()" id="lower2Team3">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team3Name2Lower"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selectedRound2Team4Lower()" id="lower2Team4">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team4Name2Lower"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!--Round 3 Lower Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--bronze">
      <h3 class="tournament-bracket__round-title">Lower Round 3</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 4th, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selectedRound3Team1Lower()" id="lower3Team1">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name3Lower"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selectedRound3Team2Lower()" id="lower3Team2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name3Lower"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!--Round 4 Lower Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--gold">
      <h3 class="tournament-bracket__round-title">Lower Round 4</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 4th, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" onclick="selectedRound4Team1Lower()" id="lower4Team1">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name4Lower"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" onclick="selectedRound4Team2Lower()" id="lower4Team2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name4Lower"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
  </div>
';
		} else {
			$steamID = $auth->SteamID;
			$stmt = $conn->prepare("SELECT * FROM brackets WHERE steamID = '$steamID'");
			$stmt->execute();
			$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $stmt->fetch();
			
			echo '
	<!-- Round 1 Upper Game 1 -->
  <div class="tournament-bracket tournament-bracket--rounded">                                                     
    <div class="tournament-bracket__round tournament-bracket__round--quarterfinals">
      <h2 class="tournament-bracket__round-title">Round 1</h2>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <!--<tr class="tournament-bracket__team tournament-bracket__team--winner">-->
                <tr class="tournament-bracket__team" id="team1">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team1"].'" id="team1Name">'.$result3["team1"].'</abbr>
                  </td> 
                </tr>
                <tr class="tournament-bracket__team" id="team2">
                  <td class="tournament-bracket__country"">
                    <abbr class="tournament-bracket__code" title="'.$result3["team2"].'" id="team2Name">'.$result3["team2"].'</abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
		
		<!-- Round 1 Upper Game 2 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="team3">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team3"].'" id="team3Name">'.$result3["team3"].'</abbr>
                  </td>

                </tr>
                <tr class="tournament-bracket__team" id="team4">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team4"].'" id="team4Name">'.$result3["team4"].'</abbr>
                  </td>

                </tr>
              </tbody>
            </table>
          </div>
        </li>
		
		<!-- Round 1 Upper Game 3 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="team5">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team5"].'" id="team5Name">'.$result3["team5"].'</abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="team6">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team6"].'" id="team6Name">'.$result3["team6"].'</abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>

		<!-- Round 1 Upper Game 4 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="team7">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team7"].'" id="team7Name">'.$result3["team7"].'</abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="team8">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title="'.$result3["team8"].'" id="team8Name">'.$result3["team8"].'</abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!-- Round 2 Upper Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--semifinals">
      <h3 class="tournament-bracket__round-title">Round 2</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="team1Round2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name2"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="team2Round2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name2"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>

		<!-- Round 2 Upper Game 2 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="team3Round2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team3Name2"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="team4Round2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team4Name2"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!--Semifinals Upper Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--bronze">
      <h3 class="tournament-bracket__round-title">Semifinals</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 4th, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="team1Round3">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name3"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="team2Round3">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name3"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!--Finals Upper Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--gold">
      <h3 class="tournament-bracket__round-title">Finals</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 4th, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="team1Round4">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name4"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="team2Round4">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name4"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
  </div>
  
  <br /> <br />
  <hr/>
  
  <!--Round 1 Lower Game 1 -->
  <div class="tournament-bracket tournament-bracket--rounded">                                                     
    <div class="tournament-bracket__round tournament-bracket__round--quarterfinals">
      <h2 class="tournament-bracket__round-title">Lower Round 1</h2>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <!--<tr class="tournament-bracket__team tournament-bracket__team--winner">-->
                <tr class="tournament-bracket__team" id="lower1Team1">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name1Lower"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="lower1Team2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name1Lower"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
		
		<!--Round 1 Lower Game 2 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="lower1Team3">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team3Name1Lower"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="lower1Team4">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team4Name1Lower"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!--Round 2 Lower Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--semifinals">
      <h3 class="tournament-bracket__round-title">Lower Round 2</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="lower2Team1">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name2Lower"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="lower2Team2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name2Lower"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
		
		<!--Round 2 Lower Game 2 -->
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 3rd, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="lower2Team3">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team3Name2Lower"> </abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="lower2Team4">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team4Name2Lower"> </abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!--Round 3 Lower Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--bronze">
      <h3 class="tournament-bracket__round-title">Lower Round 3</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 4th, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="lower3Team1">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name3Lower"></abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="lower3Team2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name3Lower"></abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
	
	<!--Round 4 Lower Game 1 -->
    <div class="tournament-bracket__round tournament-bracket__round--gold">
      <h3 class="tournament-bracket__round-title">Lower Round 4</h3>
      <ul class="tournament-bracket__list">
        <li class="tournament-bracket__item">
          <div class="tournament-bracket__match" tabindex="0">
            <table class="tournament-bracket__table">
              <caption class="tournament-bracket__caption">
                <time datetime="2016-12-03">December 4th, 2016</time>
              </caption>
              <thead class="sr-only">
                <tr>
                  <th>Team</th>
                  <th>Score</th>
                </tr>
              </thead>  
              <tbody class="tournament-bracket__content">
                <tr class="tournament-bracket__team" id="lower4Team1">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team1Name4Lower"></abbr>
                  </td>
                </tr>
                <tr class="tournament-bracket__team" id="lower4Team2">
                  <td class="tournament-bracket__country">
                    <abbr class="tournament-bracket__code" title=" " id="team2Name4Lower"></abbr>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </li>
      </ul>
    </div>
  </div>
';
			//upper round 1
			if ($result["upGame1"] == $result3["team1"]) {
				echo '<script type="text/javascript">selected1();</script>';
			} else if ($result["upGame1"] == $result3["team2"]) {
				echo '<script type="text/javascript">selected2();</script>';
			}
			if ($result["upGame2"] == $result3["team3"]) {
				echo '<script type="text/javascript">selected3();</script>';
			} else if ($result["upGame2"] == $result3["team4"]) {
				echo '<script type="text/javascript">selected4();</script>';
			}
			if ($result["upGame3"] == $result3["team5"]) {
				echo '<script type="text/javascript">selected5();</script>';
			} else if ($result["upGame3"] == $result3["team6"]) {
				echo '<script type="text/javascript">selected6();</script>';
			}
			if ($result["upGame4"] == $result3["team7"]) {
				echo '<script type="text/javascript">selected7();</script>';
			} else if ($result["upGame4"] == $result3["team8"]) {
				echo '<script type="text/javascript">selected8();</script>';
			}
			//upper round 2
			if ($result["upGame1Round2"] == $result3["team1"]) {
				echo '<script type="text/javascript">selectedRound2Team1();</script>';
			} else if ($result["upGame1Round2"] == $result3["team2"]) {
				echo '<script type="text/javascript">selectedRound2Team1();</script>';
			}
			if ($result["upGame1Round2"] == $result3["team3"]) {
				echo '<script type="text/javascript">selectedRound2Team2();</script>';
			} else if ($result["upGame1Round2"] == $result3["team4"]) {
				echo '<script type="text/javascript">selectedRound2Team2();</script>';
			}
			if ($result["upGame2Round2"] == $result3["team5"]) {
				echo '<script type="text/javascript">selectedRound2Team3();</script>';
			} else if ($result["upGame2Round2"] == $result3["team6"]) {
				echo '<script type="text/javascript">selectedRound2Team3();</script>';
			}
			if ($result["upGame2Round2"] == $result3["team7"]) {
				echo '<script type="text/javascript">selectedRound2Team4();</script>';
			} else if ($result["upGame2Round2"] == $result3["team8"]) {
				echo '<script type="text/javascript">selectedRound2Team4();</script>';
			}
			//upper semifinals
			if ($result["upGame1Round3"] == $result3["team1"]) {
				echo '<script type="text/javascript">selectedRound3Team1();</script>';
			} else if ($result["upGame1Round3"] == $result3["team2"]) {
				echo '<script type="text/javascript">selectedRound3Team1();</script>';
			} else if ($result["upGame1Round3"] == $result3["team3"]) {
				echo '<script type="text/javascript">selectedRound3Team1();</script>';
			} else if ($result["upGame1Round3"] == $result3["team4"]) {
				echo '<script type="text/javascript">selectedRound3Team1();</script>';
			}
			if ($result["upGame1Round3"] == $result3["team5"]) {
				echo '<script type="text/javascript">selectedRound3Team2();</script>';
			} else if ($result["upGame1Round3"] == $result3["team6"]) {
				echo '<script type="text/javascript">selectedRound3Team2();</script>';
			} else if ($result["upGame1Round3"] == $result3["team7"]) {
				echo '<script type="text/javascript">selectedRound3Team2();</script>';
			} else if ($result["upGame1Round3"] == $result3["team8"]) {
				echo '<script type="text/javascript">selectedRound3Team2();</script>';
			}
			//lower round 1
			if ($result["lowGame1Round1"] == $result3["team1"]) {
				echo '<script type="text/javascript">selectedRound1Team1Lower();</script>';
			} else if ($result["lowGame1Round1"] == $result3["team2"]) {
				echo '<script type="text/javascript">selectedRound1Team1Lower();</script>';
			}
			if ($result["lowGame1Round1"] == $result3["team3"]) {
				echo '<script type="text/javascript">selectedRound1Team2Lower();</script>';
			} else if ($result["lowGame1Round1"] == $result3["team4"]) {
				echo '<script type="text/javascript">selectedRound1Team2Lower();</script>';
			}
			if ($result["lowGame2Round1"] == $result3["team5"]) {
				echo '<script type="text/javascript">selectedRound1Team3Lower();</script>';
			} else if ($result["lowGame2Round1"] == $result3["team6"]) {
				echo '<script type="text/javascript">selectedRound1Team3Lower();</script>';
			}
			if ($result["lowGame2Round1"] == $result3["team7"]) {
				echo '<script type="text/javascript">selectedRound1Team4Lower();</script>';
			} else if ($result["lowGame2Round1"] == $result3["team8"]) {
				echo '<script type="text/javascript">selectedRound1Team4Lower();</script>';
			}
			//lower round 2
			if ($result["lowGame1Round2"] == $result3["team5"]) {
				echo '<script type="text/javascript">selectedRound2Team1Lower();</script>';
			} else if ($result["lowGame1Round2"] == $result3["team6"]) {
				echo '<script type="text/javascript">selectedRound2Team1Lower();</script>';
			} else if ($result["lowGame1Round2"] == $result3["team7"]) {
				echo '<script type="text/javascript">selectedRound2Team1Lower();</script>';
			} else if ($result["lowGame1Round2"] == $result3["team8"]) {
				echo '<script type="text/javascript">selectedRound2Team1Lower();</script>';
			} else if ($result["lowGame1Round2"] == $result3["team1"]) {
				echo '<script type="text/javascript">selectedRound2Team2Lower();</script>';
			} else if ($result["lowGame1Round2"] == $result3["team2"]) {
				echo '<script type="text/javascript">selectedRound2Team2Lower();</script>';
			} else if ($result["lowGame1Round2"] == $result3["team3"]) {
				echo '<script type="text/javascript">selectedRound2Team2Lower();</script>';
			} else if ($result["lowGame1Round2"] == $result3["team4"]) {
				echo '<script type="text/javascript">selectedRound2Team2Lower();</script>';
			}
			if ($result["lowGame2Round2"] == $result3["team5"]) {
				echo '<script type="text/javascript">selectedRound2Team4Lower();</script>';
			} else if ($result["lowGame2Round2"] == $result3["team6"]) {
				echo '<script type="text/javascript">selectedRound2Team4Lower();</script>';
			} else if ($result["lowGame2Round2"] == $result3["team7"]) {
				echo '<script type="text/javascript">selectedRound2Team4Lower();</script>';
			} else if ($result["lowGame2Round2"] == $result3["team8"]) {
				echo '<script type="text/javascript">selectedRound2Team4Lower();</script>';
			} else if ($result["lowGame2Round2"] == $result3["team1"]) {
				echo '<script type="text/javascript">selectedRound2Team3Lower();</script>';
			} else if ($result["lowGame2Round2"] == $result3["team2"]) {
				echo '<script type="text/javascript">selectedRound2Team3Lower();</script>';
			} else if ($result["lowGame2Round2"] == $result3["team3"]) {
				echo '<script type="text/javascript">selectedRound2Team3Lower();</script>';
			} else if ($result["lowGame2Round2"] == $result3["team4"]) {
				echo '<script type="text/javascript">selectedRound2Team3Lower();</script>';
			}
			//lower round 3
			echo '<script type="text/javascript">updateRound3Lower(\''.$result["lowGame1Round3"].'\');</script>';
			//lower round 4
			echo '<script type="text/javascript">updateRound4Lower(\''.$result["lowGame1Round4"].'\');</script>';
			//final
			echo '<script type="text/javascript">updateRound4Upper(\''.$result["upGame1Round4"].'\');</script>';
		}
	} else {
		echo "<center><h4>Please Login First!</h4><a href=\"" . $auth->GetLoginURL() . "\"><img style=\"border: 0;\" src=\"assets/sits_large_noborder.png\" alt=\"Sign in through Steam\" /></a></center>";
		
	}
	?>
</section>


<!-- Contact Section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->  

<section id="contact">
  <div class="container">
    <h1>Contact</h1>
    <div class="block"></div>
    <iframe src="https://discordapp.com/widget?id=147815063326031872&theme=dark" width="100%" height="500" allowtransparency="true" frameborder="0"></iframe>
  </div>
</section>

<!-- Footer Section
–––––––––––––––––––––––––––––––––––––––––––––––––– -->  

<footer>
  <div class="container">
    <div class="nine columns">
      <p><a href="privacypolicy.html"><font color="white">Privacy Policy</font></a> | <a href="tos.html"><font color="white">Terms Of Service</font></a></p>
    </div>
    <div class="three columns"> <span class="typcn typcn-social-facebook-circular socialIcons"></span><span class="typcn typcn-social-twitter-circular socialIcons"></span></div>
  </div>
</footer>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js'></script>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>

  <script src="js/index.js"></script>

</body>
</html>
