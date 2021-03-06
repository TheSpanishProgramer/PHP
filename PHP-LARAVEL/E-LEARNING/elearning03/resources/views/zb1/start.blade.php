
<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OESD Modellsatz ZB1</title>
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/dist/css/simpleaudioplayer.min.css">
  </head>
  <body>

    <!-- HEADER SECTION: SEE STYLEGUIDE FOR FURTHER DOCS -->
    <header>
      <div class="logo-cnt"><img src="/assets/img/logo.png"></div>
      <div class="title-cnt">
        <h4><b>Zertifikat B1</b> Modellsatz Lesen</h4></div>
      <div class="progress-cnt">
        <span  id="progressbar">
          <small id="testtime"><b>Testfortschritt:</b> </small>
          <div class="progress" id="section-progress" role="progressbar" tabindex="0" aria-valuenow="0" aria-valuemin="0" aria-valuetext="25 percent" aria-valuemax="100">
            <span id="timer_1_done" class="progress-meter " style="width: 0%" data-allow-html="true" data-tooltip title=""></span>
            <span id="timer_1_left" class="progress-meter " style="width: 99%" data-allow-html="true" data-tooltip title=""></span>
          </div>
          <div class="steps" style="display:none;">
            	<div class="step-item" id="itembox_1"><a href="#" onClick="loadQuestion('zb1',1);">1</a></div>
            	<div class="step-item" id="itembox_2"><a href="#" onClick="loadQuestion('zb1',2);">2</a></div>
            	<div class="step-item" id="itembox_3"><a href="#" onClick="loadQuestion('zb1',4);">3</a></div>
            	<div class="step-item" id="itembox_4"><a href="#" onClick="loadQuestion('zb1',5);">4</a></div>
            	<div class="step-item" id="itembox_5"><a href="#" onClick="loadQuestion('zb1',6);">5</a></div>
            </div>
        </span>
      </div>
      <div class="action-cnt">
        <div class="button-group">
          <a href="#" class="button hollow success" style="display:none" id="playericon"><i class="fa fa-bullhorn"></i></a>
          <a  onClick="endTest()" class="button hollow primary"><i class="fa fa-close"></i> <span>Beenden</span></a>
        </div>
      </div>
    </header>
    <div id="player" style="display:none">
		<span class="amplitude-play button tiny"><i class="fa fa-play" aria-hidden="true"></i>
		</span>
			<span class="amplitude-pause button tiny"><i class="fa fa-pause" aria-hidden="true"></i></span>
			<span class="amplitude-stop button tiny secondary"><i class="fa fa-stop" aria-hidden="true"></i></span>
			<span class="amplitude-prev button tiny secondary"><i class="fa fa-fast-backward" aria-hidden="true"></i></span>
			<span class="amplitude-next button tiny secondary"><i class="fa fa-fast-forward" aria-hidden="true"></i></span>
			<span class="amplitude-volume-down button tiny secondary"><i class="fa fa-volume-down" aria-hidden="true"></i></span>
			<span class="amplitude-volume-up button tiny secondary"><i class="fa fa-volume-up" aria-hidden="true"></i></span>
			<span class="amplitude-time-remaining button tiny disabled" amplitude-main-time-remaining="true"></span>
			<span class="button tiny disabled" amplitude-song-info="name" amplitude-main-song-info="true"></span>
			<ul class="dropdown menu" data-dropdown-menu style="display: inline-block">
				<li>
					<a href="#" class="">
						<i class="fa fa-align-justify" aria-hidden="true"></i>
					</a>
					<ul id="playlist" class="menu"></ul>
			</li>
			</ul>
	</div>
    <!-- //HEADER SECTION: SEE STYLEGUIDE FOR FURTHER DOCS -->
    
    
    <!-- MAIN SECTION: SEE STYLEGUIDE FOR FURTHER DOCS -->
    <section id="main">
     <form id="questionform" >
		{{ csrf_field() }}
      <!-- NAVIGATION WITH INSTRUCTIONS: SEE STYLEGUIDE FOR FURTHER DOCS -->
      <nav data-equalizer>
      
        <div id="instructions" class="startpage-zb1" data-equalizer-watch onClick="loadQuestion('zb1','vorwort');">
          <header><h3>Internationale Pr??fungen f??r Deutsch als Fremdsprache</h3></header>
              <span class="left-logos">??SD<br>GOETHE</span>
          <p>
            <b>B1</b><br>
            <span>Zertifikat B1</span><br><br>
            <span class="highlight"><b>ZB1</b></span><br><br>
            <span>Modellsatz <b>Erwachsene</b></span>
          </p>
          <span class="left-letter highlight">M</span>
      
          <img src="/assets/img/zb1-cover.png" >
          
        </div>
        <a class="nav-button prev disabled" data-equalizer-watch>
          <i class="fa fa-angle-left fa-2x"></i>
        </a>
        <a onClick="loadQuestion('zb1','vorwort');" href="#" class="nav-button next" data-equalizer-watch>
          <i class="fa fa-angle-right fa-2x"></i>
        </a>
      </nav>
      <!-- //NAVIGATION WITH INSTRUCTIONS: SEE STYLEGUIDE FOR FURTHER DOCS -->
    
      <!-- CONTENT SECTION: SEE STYLEGUIDE FOR FURTHER DOCS -->
      <section id="content" data-equalizer>
    
      </section>
      <!-- //CONTENT SECTION: SEE STYLEGUIDE FOR FURTHER DOCS -->
      </form>
    </section>
    <!-- //MAIN SECTION: SEE STYLEGUIDE FOR FURTHER DOCS -->
    

    <div class="reveal" id="modal-container" data-reveal>
      <h1>Awesome. I Have It.</h1>
      <p class="lead">Your couch. It is mine.</p>
      <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
      <button class="close-button" data-close aria-label="Close modal" type="button">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <!-- <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script> -->
    <script src="/assets/js/app.js"></script>
    <script src="https://code.createjs.com/1.0.0/createjs.min.js"></script>
    <script src="/assets/dist/js/jquery.simpleaudioplayer.js"></script>
    <script src="/assets/js/questionloader.js"></script>
  </body>
</html>
