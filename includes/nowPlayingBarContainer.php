<?php
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
$resultArray = array();
while ($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);

?>

<script>

$(document).ready(function(){
  currentPlaylist = <?php echo $jsonArray; ?>;
  audioElement = new Audio();
  setTrack(currentPlaylist[0], currentPlaylist, false)
});

function setTrack(trackId, newPlaylist, play){



  audioElement.setTrack("");

  if (play){
    audioElement.play();
  }
}
function playSong(){
    $(".controlButton.play").hide();
    $(".controlButton.pause").show();
    audioElement.play();
  }
  function pauseSong(){
    $(".controlButton.play").show();
    $(".controlButton.pause").hide();
    audioElement.pause();
  }
</script>

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
                <button class="controlButton play">
                  <img src="./assets/images/icons/Play Button Circled_25px.png" title="Play" alt="play" class="play" onclick="playSong()">
                </button>
                <button class="controlButton pause" style="display: none;">
                  <img src="./assets/images/icons/Pause_25px.png" title="Pause" alt="pause" class="pause" onclick="pauseSong()">
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
