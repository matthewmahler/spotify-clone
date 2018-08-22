<?php
$songQuery = mysqli_query($con, "SELECT id FROM songs ORDER BY RAND() LIMIT 10");
$resultArray = array();
while ($row = mysqli_fetch_array($songQuery)) {
    array_push($resultArray, $row['id']);
}

$jsonArray = json_encode($resultArray);

?>

<script>

  //song started == true
  //song played false
  //song played 25%, 50%, 75%, songEnded

$(document).ready(function(){
  currentPlaylist = <?php echo $jsonArray; ?>;
  audioElement = new Audio();
  setTrack(currentPlaylist[0], currentPlaylist, false)
  updateVolumeProgressBar(audioElement.audio);
  $("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove", function(e){
    e.preventDefault();
  })
//playback

  $(".playbackBar .progressBar").mousedown(function(){
    mouseDown = true;
  })

   $(".playbackBar .progressBar").mousemove(function(e){
     if (mouseDown){
      timeFromOffset(e, this);
     }
  })
  $(".playbackBar .progressBar").mouseup(function(e){
       timeFromOffset(e, this);

  })

  $(document).mouseup(function(){
    mouseDown = false
  })


//volume

   $(".volumeBar .progressBar").mousedown(function(){
    mouseDown = true;
  })

   $(".volumeBar .progressBar").mousemove(function(e){
     if (mouseDown){
      var percentage = e.offsetX / $(this).width();

      if (percentage >= 0 && percentage <= 1){
          audioElement.audio.volume = percentage;
      }

     }
  })
  $(".volumeBar .progressBar").mouseup(function(e){
    var percentage = e.offsetX / $(this).width();

if (percentage >= 0 && percentage <= 1){
    audioElement.audio.volume = percentage;
}
  })


});

function timeFromOffset(mouse, progressBar){
  var percentage = mouse.offsetX / $(progressBar).width() * 100;
  var seconds = audioElement.audio.duration * (percentage / 100);
audioElement.setTime(seconds);
}

function setTrack(trackId, newPlaylist, play){
  $.post("./includes/handlers/ajax/getSongJSON.php", {songId: trackId}, function(trackData){
    var track = JSON.parse(trackData);
    $("span.trackNamePlayer").text(track.title);

    $.post("./includes/handlers/ajax/getArtistJSON.php", {artistId: track.artist}, function(artistData){
      var artist = JSON.parse(artistData);
      $("span.artistNamePlayer").text(artist.name);
    })

    $.post("./includes/handlers/ajax/getAlbumJSON.php", {albumId: track.album}, function(albumData){
      var album = JSON.parse(albumData);
      $(".albumLink img").attr("src", album.artworkPath);
    })

    audioElement.setTrack(track);
    playSong();
  })


  if (play){
    audioElement.play();
    $(".controlButton.play").hide();
    $(".controlButton.pause").show();
  }
}

function playSong(){

  if(audioElement.audio.currentTime == 0){
    $.post("./includes/handlers/ajax/updatePlays.php", {songId: audioElement.currentlyPlaying.id});
  }
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
              <img src="" class="albumArt">
            </span>
            <div class="trackInfo">
              <span class="trackNamePlayer"></span>
              <span class="artistNamePlayer"></span>
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
