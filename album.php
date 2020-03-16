<?php @include 'includes/layout/header.php';

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









<?php @include 'includes/layout/footer.php' ?>