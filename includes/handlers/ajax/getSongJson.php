<?php 
    @include '../../config.php';

    if(isset($_POST['songId'])) {
        $songId = $_POST['songId'];

        $query = mysqli_query($con, "SELECT * FROM songs WHERE id = '$songId'") or die(mysqli_error($con));

        $resultQuery = mysqli_fetch_assoc($query);

        echo json_encode($resultQuery);

    }


?>