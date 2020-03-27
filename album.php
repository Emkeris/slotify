<?php @include 'includes/includedFiles.php';

    if(isset($_GET['id'])) {
        $albumId = $_GET['id'];
    } else {
        header("Location: index.php");
    }

// Album
    // $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'") or die(mysqli_error($con));
    // $album = mysqli_fetch_array($albumQuery);
    $album = new Album($con, $albumId);
    $artist = $album->getArtist();
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getArtworkPath() ?>" alt="<?php echo $album->getTitle() ?>">
    </div>
    <div class="rightSection">
        <h2><?php echo $album->getTitle() ?></h2>
        <p>By <?php echo $artist->getName() ?></p>
        <p><?php echo $album->getNumberOfSongs() ?> songs</p>
    </div>
</div>

<div class="trackListContainer">
    <ul class="trackList">
        <?php 
            $i = 1;
            $songsIdArray = $album->getSongsIds();

            foreach($songsIdArray as $songId) :
            $albumSong = new Song($con, $songId);
            $albumArtist = $albumSong->getArtist(); ?> 


            <li class="trackListRow">
                <div class="trackCount">
                    <img class="play" src="assets/images/icons/play-white.png" alt="Play" onclick='setTrack(<?php echo "\"" .  $albumSong->getId() . "\""?>, tempPlaylist, true)'>
                    <span class="trackNumber"><?php echo $i ?></span>
                </div>

                <div class="trackInfo">
                    <span class="trackName"><?php echo $albumSong->getTitle() ?></span>
                    <span class="artistName"><?php echo $albumArtist->getName() ?></span>
                </div>

                <div class="trackOptions">
                    <input type="hidden" class="songId" value="<?php echo $albumSong->getId() ?>">
                    <img class="optionsBtn" src="assets/images/icons/more.png" alt="More" onclick="showOptionsMenu(this)">
                </div>
                
                <div class="trackDuration">
                    <span class="duration"><?php echo $albumSong->getDuration() ?></span>
                </div>
            </li>
            
            <?php $i++ ?>
        <?php endforeach; ?>

        <script>
            var tempSongIds = '<?php echo json_encode($songsIdArray); ?>';
            tempPlaylist = JSON.parse(tempSongIds);
        </script>


    </ul>
</div>

<nav class="optionsMenu">
    <input type="hidden" class="songId">
    <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</nav>

