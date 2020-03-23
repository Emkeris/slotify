<?php 
    @include 'includes/config.php'; 
    @include 'includes/classes/Artist.php'; 
    @include 'includes/classes/Album.php'; 
    @include 'includes/classes/Song.php'; 


    if(isset($_SESSION['loggedUser'])) {
        $loggedUser = $_SESSION['loggedUser'];
    } else {
        header("Location: register.php");
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slotify</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/d3js/5.15.0/d3.min.js"></script> -->
    <script
        src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
        crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
</head>
<body>




<div id="mainContainer">
    <div id="topContainer">
        <!-- Left Container for navigation -->
        <?php @include 'includes/layout/navBarContainer.php' ?>

        <div id="mainViewContainer">
            <div id="mainContent">
            