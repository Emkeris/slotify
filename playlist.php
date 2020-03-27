<?php @include 'includes/includedFiles.php';

    if(isset($_GET['id'])) {
        $playlistId = $_GET['id'];
    } else {
        header("Location: index.php");
    }

    $playlist = new Playlist($con, $playlistId);
    $owner = new User($con, $playlist->getOwner());
?>

<div class="entityInfo">
    <div class="leftSection">
        <div class="playlistImage">
            <img src="assets/images/icons//playlist.png" alt="">
        </div>
    </div>
    <div class="rightSection">
        <h2><?php echo $playlist->getName(); ?></h2>
        <p>By <?php echo $playlist->getOwner() ?></p>
        <p><?php echo $playlist->getNumberOfSongs() ?> songs</p>
        <button class="button" onclick='deletePlaylist("<?php echo $playlistId ?>")'>Delete Playlist</button>
    </div>
</div>

<div class="trackListContainer">
    <ul class="trackList">
        <?php 
            $i = 1;
            $songsIdArray = $playlist->getSongsIds();

            foreach($songsIdArray as $songId) :
            $playlistSong = new Song($con, $songId);
            $songArtist = $playlistSong->getArtist(); ?> 
            

            <!-- <div>Somthing</div> -->


            <li class="trackListRow">
                <div class="trackCount">
                    <img class="play" src="assets/images/icons/play-white.png" alt="Play" onclick='setTrack(<?php echo "\"" .  $playlistSong->getId() . "\""?>, tempPlaylist, true)'>
                    <span class="trackNumber"><?php echo $i++ ?></span>
                </div>

                <div class="trackInfo">
                    <span class="trackName"><?php echo $playlistSong->getTitle() ?></span>
                    <span class="artistName"><?php echo $songArtist->getName() ?></span>
                </div>

                <div class="trackOptions">
                    <input type="hidden" class="songId" value="<?php echo $playlistSong->getId() ?>">
                    <img class="optionsBtn" src="assets/images/icons/more.png" alt="More" onclick="showOptionsMenu(this)">
                </div>
                
                <div class="trackDuration">
                    <span class="duration"><?php echo $playlistSong->getDuration() ?></span>
                </div>
            </li>
        <?php endforeach ?>

        <script>
            var tempSongIds = '<?php echo json_encode($songsIdArray); ?>';
            tempPlaylist = JSON.parse(tempSongIds);
        </script>


    </ul>
</div>


<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
    <div class="item" onclick="removeFromPlaylist(this, <?php echo $playlistId ?>)">Remove from Playlist</div>
</nav>


