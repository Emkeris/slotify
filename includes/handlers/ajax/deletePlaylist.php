<?php 
    @include '../../config.php';

    if(isset($_POST['playlistId'])) {
        $playlistId = $_POST['playlistId'];

        $playlistQuery = mysqli_query($con, "DELETE FROM playlists WHERE id = '$playlistId'") or die(mysqli_error($con));
        $songQuery = mysqli_query($con, "DELETE FROM playlistSongs WHERE playlistId = '$playlistId'") or die(mysqli_error($con));
    } else {
        echo "PlaylistId was not passed into deletePlaylist";
    }

?>