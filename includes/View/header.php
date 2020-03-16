<?php 
    @include 'includes/config.php'; 

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
</head>
<body>

<div id="mainContainer">
    <div id="topContainer">
        <!-- Left Container for navigation -->
        <?php @include 'includes/View/navBarContainer.php' ?>

        <div id="mainViewContainer">
            <div id="mainContent">
            