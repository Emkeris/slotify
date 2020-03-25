<?php 
    @include 'includes/includedFiles.php';
?>
    <h1 class="pageHeadingBig">You might also like </h1>

    <div class="gridViewContainer">
        <?php 
            $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10") or die(mysqli_error($con));
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

