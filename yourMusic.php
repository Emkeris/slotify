<?php 
    @include 'includes/includedFiles.php'

?>

<div class="playlistsContainer">
    <div class="gridViewContainer">
        <h2>PLAYLISTS</h2>
        <div class="buttonItems">
            <button class="button green" onclick="createPlaylist()">New Playlist</button>
        </div>

        <?php 
            $userName = $userLoggedIn->getUsername();
            $playlistQuery = mysqli_query($con, "SELECT * FROM playlists WHERE owner = '$userName'") or die(mysqli_error($con));
            
            if(mysqli_num_rows($playlistQuery) == 0) {
                echo "<span class='noResults'>You don't have any playlists yet</span>";
            }

            while($row = mysqli_fetch_assoc($playlistQuery)) :
                $playlist = new Playlist($con, $row);?>
                <div class="gridViewItem" role="link" tabindex="0" onclick='openPage(<?php echo "\"playlist.php?id=" . $playlist->getId() . "\""?>)' >
                    <div class="playlistImage">
                        <img src="assets/images/icons/playlist.png" alt="">
                    </div>

                    <div class="gridViewInfo">
                        <?php echo $playlist->getName(); ?>
                    </div>
                </div>
        <?php endwhile; ?>

    </div>


</div>