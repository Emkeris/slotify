<?php 
    session_start();
    $con = new mysqli("localhost", "root", "", "slotify") or die(mysqli_error($con));

    if(isset($_SESSION['loggedUser'])) {
        $loggedUser = $_SESSION['loggedUser'];
        
    }
?>