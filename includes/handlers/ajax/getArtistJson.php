<?php 
    @include '../../config.php';

    if(isset($_POST['artistId'])) {
        $artistId = $_POST['artistId'];

        $query = mysqli_query($con, "SELECT * FROM artist WHERE id = '$artistId'") or die(mysqli_error($con));

        $resultQuery = mysqli_fetch_assoc($query);

        echo json_encode($resultQuery);

    }


?>