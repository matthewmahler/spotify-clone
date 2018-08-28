<?php
include "./includes/includedFiles.php"
?>

<div class="playlistContainer">
  <div class="gridViewContainer">
    <h2>Playlists</h2>

    <div class="buttonItems" onclick="createPlaylist()">
      <button class="button green">
        NEW PLAYLIST
      </button>
    </div>
  </div>

<?php
$username = $userLoggedIn->getUsername();

$playlistQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner = '$username'");

if (mysqli_num_rows($playlistQuery) == 0) {
    echo "<span class='noResults'> No playlists found </span>
    ";
}

while ($row = mysqli_fetch_array($playlistQuery)) {

    echo "<div class='gridViewItem'>

            <div class='playlistImage'>
              <img src='assets/images/icons/playlist.png'>

            </div>

            <div class='gridViewInfo'>"
        . $row['name'] .
        "</div>

				</div>";

}
?>



</div>
