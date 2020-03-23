<?php 
    @include '../../config.php';

    if(isset($_POST['albumId'])) {
        $albumId = $_POST['albumId'];

        $query = mysqli_query($con, "SELECT * FROM albums WHERE id = '$albumId'") or die(mysqli_error($con));

        $resultQuery = mysqli_fetch_assoc($query);

        echo json_encode($resultQuery);

    }


?>