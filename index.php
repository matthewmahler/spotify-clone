<?php
include './includes/config.php';

// session_destroy();

if (isset($_SESSION['userLoggedIn'])) {
} else {
    header("Location: register.php");
}
?>


<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>TuneServer</title>
  <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
  <div class="mainContainer">
    <div id="topContainer">
      <div id="navContainer">
        <nav class="navBar">
          <a href="." class="logo">
            <img src="./assets/images/icons/Dog.png">
          </a>

          <div class="group">
            <div class="navItem">
              <a href="./search.php" class="navItemLink">
              Search
              <img src="./assets/images/icons/Search_25px.png" alt="search" class="icon">
            </a>
            </div>
          </div>

          <div class="group">
            <div class="navItem">
                <a href="./browse.php" class="navItemLink">Browse</a>
              </div>
              <div class="navItem">
                <a href="./yourMusic.php" class="navItemLink">Your Music</a>
              </div>
              <div class="navItem">
                <a href="./profile.php" class="navItemLink">Profile</a>
              </div>
          </div>

        </nav>
      </div>
    </div>

    <div id="nowPlayingBarContainer">
      <div id="nowPlayingBar">
        <div id="nowPlayingLeft">
          <div class="content">
            <span class="albumLink">
              <img src="./assets/images/icons/Musical Notes_104px.png" class="albumArt">
            </span>
            <div class="trackInfo">
              <span class="trackName">Track Name</span>
              <span class="artistName">Artist Name</span>
            </div>

          </div>
        </div>
        <div id="nowPlayingCenter">
            <div class="content playerControls">
              <div class="buttons">
                <button class="controlButton">
                  <img src="./assets/images/icons/Shuffle_25px.png" title="Shuffle" alt="shuffle" class=" shuffle">
                </button>
                <button class="controlButton">
                  <img src="./assets/images/icons/Skip to Start_25px.png" title="Previous" alt="previous" class="previous">
                </button>
                <button class="controlButton">
                  <img src="./assets/images/icons/Play Button Circled_25px.png" title="Play" alt="play" class="play">
                </button>
                <button class="controlButton" style="display: none;">
                  <img src="./assets/images/icons/Pause_25px.png" title="Pause" alt="pause" class="pause" >
                </button>
                <button class="controlButton">
                  <img src="./assets/images/icons/End_25px.png" title="Next" alt="next" class="next">
                </button>
                <button class="controlButton">
                  <img src="./assets/images/icons/Repeat_25px.png" title="Repeat" alt="repeat" class="repeat">
                </button>
              </div>
              <div class="playbackBar">
                <span class="progressTime current">0:00</span>
                <div class="progressBar">
                  <div class="progressBarBackground">
                  <div class="progress"></div>
                  </div>

                </div>
                <span class="progressTime remaining">0:00</span>
              </div>

            </div>
        </div>
        <div id="nowPlayingRight">
          <div class="volumeBar">
            <button class="controlButton volume" title="Volume">
              <img src="./assets/images/icons/Speaker_25px.png" alt="volume">
            </button>
            <div class="progressBar">
                  <div class="progressBarBackground">
                  <div class="progress"></div>
                  </div>

                </div>
          </div>
        </div>



      </div>
    </div>
  </div>
</body>
</html>
