<?php @include 'includes/View/header.php'?>

    <h1 class="pageHeadingBig">You might also like </h1>

    <div class="gridViewContainer">
        <?php 
            $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10") or die(mysqli_error($con));
            while($row = mysqli_fetch_array($albumQuery)) :?>
                <div class="gridViewItem">
                    <a href="album.php?id=<?php echo $row['id'] ?>">
                        <img src="<?php echo $row['artworkPath']?>" alt="<?php echo $row['title']  ?>">
                        <div class="gridViewInfo">
                            <?php echo $row['title'] ?>
                        </div>
                    </a>
                </div>

        <?php endwhile; ?>

        
    </div>

<?php @include 'includes/View/footer.php'?>

