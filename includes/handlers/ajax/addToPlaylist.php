<?php 
    @include '../../config.php';

    if(isset($_POST['playlistId']) && isset($_POST['songId'])) {
        $playlistId = $_POST['playlistId'];
        $songId = $_POST['songId'];

        $orderIdQuery = mysqli_query($con, "SELECT IFNULL(MAX(playlistOrder) + 1, 1) as playlistOrder FROM playlistSongs WHERE playlistId = '$playlistId'") or die(mysqli_error($con));
        $row = mysqli_fetch_assoc($orderIdQuery);
        $order = $row['playlistOrder'];

        $query = mysqli_query($con, "INSERT INTO playlistSongs (songId, playlistId, playlistOrder) VALUES ('$songId', '$playlistId', '$order')") or die(mysqli_error($con));
    } else {
        echo "PlaylistId or songId was not passed into AddToPlaylist.php";
    }


?>