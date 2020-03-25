<?php 
    @include 'includes/includedFiles.php';

    if(isset($_GET['id'])) {
        $artistId = $_GET['id'];
    } else {
        header("Location: index.php");
    }

    $artist = new Artist($con, $artistId);
?>

<div class="entityInfo borderBottom">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artist->getName(); ?></h1>
            <div class="headerButtons">
                <button class="button green" onclick="playFirstSong()">Play</button>
            </div>
        </div>
    </div>
</div>

<div class="trackListContainer borderBottom">
    <h2 class="h2text">SONGS</h2>
    <ul class="trackList">
        <?php 
            $i = 1;
            $songsIdArray = $artist->getSongIds();

            foreach($songsIdArray as $songId) :
                if($i > 5) {
                    break;
                }
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
                    <img class="optionsBtn" src="assets/images/icons/more.png" alt="More">
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

<div class="gridViewContainer">
    <h2>ALBUMS</h2>
        <?php 
            $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE artist = '$artistId' ") or die(mysqli_error($con));
            while($row = mysqli_fetch_assoc($albumQuery)) :?>
                <div class="gridViewItem">
                    <span role="link" tabindex="0" onclick="openPage('album.php?id=<?php echo $row['id'] ?>')">
                        <img src="<?php echo $row['artworkPath']?>" alt="<?php echo $row['title']  ?>">
                        <div class="gridViewInfo">
                            <?php echo $row['title'] ?>
                        </div>
                    </span>
                </div>
        <?php endwhile; ?>
    </div>