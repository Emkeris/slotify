<?php 
    @include 'includes/includedFiles.php';

    if(isset($_GET['term'])) {
        $term = urldecode($_GET['term']);
    } else {
        $term = '';
    }
?>

<div class="searchContainer">
    <h4>Search for an artist, album or song</h4>
    <input type="text" class="searchInput" value="<?php echo $term ?>" placeholder="Start typing..." onfocus="var val=this.value; this.value=''; this.value= val;">
</div>

<script>

$(".searchInput").focus();

$(function () {
    $(".searchInput").keyup(function() {
        clearTimeout(timer);

        timer = setTimeout(function() {
            var val = $(".searchInput").val();
            openPage("search.php?term=" + val);
        }, 1500);
    });
});

</script>

<?php 
    if($term == '') {
        exit();
    }
?>

<div class="trackListContainer borderBottom">
    <h2 class="h2text">SONGS</h2>
    <ul class="trackList">
        
        <?php 

            $songsQuery = mysqli_query($con, "SELECT id FROM songs WHERE title LIKE '$term%' LIMIT 10") or die(mysqli_error($con));

            if(mysqli_num_rows($songsQuery) == 0) {
                echo "<span class='noResults'>No songs found maching " . $term . "</span>";
            }

            $songIdArray = array();
            $i = 1;

            while($row = mysqli_fetch_array($songsQuery)) :
                if($i > 15) {
                    break;
                }

                array_push($songIdArray, $row['id']);

                $albumSong = new Song($con, $row['id']);
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
        <?php endwhile ?>

        <script>
            var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
            tempPlaylist = JSON.parse(tempSongIds);
        </script>


    </ul>
</div>

<div class="artistContainer borderBottom">
    <h2>Artists</h2>
    <?php 
    
        $artistQuery = mysqli_query($con, "SELECT id FROM artist WHERE name LIKE '$term%' LIMIT 10") or die(mysqli_error($con));
    
        if(mysqli_num_rows($artistQuery) == 0) {
            echo "<span class='noResults'>No Artists found maching " . $term . "</span>";
        }

        while($row = mysqli_fetch_assoc($artistQuery)) :
            $artistFount = new Artist($con, $row['id']);
        ?>

        <div class="searchResultRow">
            <div class="artistName">
                <span role="link" tabindex="0" onclick='openPage(<?php echo"\"  artis.php?id=" . $artistFount->getId(); ?>)'><?php echo $artistFount->getName(); ?></span>
            </div>
        </div>
    <?php endwhile ?>
</div>

<div class="gridViewContainer">
    <h2>ALBUMS</h2>
    <?php 
        $albumQuery = mysqli_query($con, "SELECT * FROM albums WHERE title LIKE '$term%' LIMIT 10") or die(mysqli_error($con));
        
        if(mysqli_num_rows($albumQuery) == 0) {
            echo "<span class='noResults'>No Albums found maching " . $term . "</span>";
        }

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

