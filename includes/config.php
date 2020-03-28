<?php 
    session_start();
    $con = new mysqli("remotemysql.com", "kI8aY7uiPB", "ybeizwC7mN", "kI8aY7uiPB") or die(mysqli_error($con));

    if(isset($_SESSION['userLoggedIn'])) {
        $userLoggedIn = $_SESSION['userLoggedIn'];
        
    }
?>