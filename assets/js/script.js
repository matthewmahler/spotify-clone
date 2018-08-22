var currentPlaylist = [];
var audioElement;
var mouseDown = false;

function formatTime(duration) {
  var time = Math.round(duration);
  var minutes = Math.floor(time / 60);
  var seconds = time - (minutes * 60);

  var extraZero = (seconds < 10) ? "0" : "";

  return minutes + ":" + extraZero + seconds;
}

function updateTimeProgressBar(audio) {
  $(".progressTime.current").text(formatTime(audio.currentTime))
  $(".progressTime.remaining").text(formatTime(audio.duration - audio.currentTime))

  var progress = ((audio.currentTime / audio.duration) * 100);
  $(".playbackBar .progress").css("width", progress + "%");
}

function updateVolumeProgressBar(audio) {
  var volume = (audio.volume * 100);
  $(".volumeBar .progress").css("width", volume + "%");
}

class Audio {
  constructor() {
    this.currentlyPlaying;
    this.audio = document.createElement('audio');

    this.audio.addEventListener('canplay', function () {
      var duration = formatTime(this.duration);
      $(".progressTime.remaining").text(duration);

    });

    this.audio.addEventListener('timeupdate', function () {
      if (this.duration) {
        updateTimeProgressBar(this);
      }
    })

    this.audio.addEventListener('volumechange', function () {
      updateVolumeProgressBar(this);
    })

    this.setTrack = function (track) {
      this.currentlyPlaying = track;
      this.audio.src = track.path;
    };
    this.play = function () {
      this.audio.play();
    };
    this.pause = function () {
      this.audio.pause();
    };
    this.setTime = function (seconds) {
      this.audio.currentTime = seconds;
    }
  }
}