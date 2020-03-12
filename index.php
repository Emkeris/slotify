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
        <div id="navBarContainer">
            <nav class="navBar">
                <a href="index.php" class="logo">
                    <img src="assets/images/icons/musicIcon.png" alt="Slotify">
                </a>

                <div class="group">
                    <div class="navItem">
                        <a href="search.php" class="navItemLink">Search
                            <img src="assets/images/icons/search.png" class="icon" alt="Search">
                        </a>
                    </div>
                </div>
                <div class="group">
                    <div class="navItem">
                        <a href="browse.php" class="navItemLink">Browse</a>
                    </div><div class="navItem">
                        <a href="yourMusic.php" class="navItemLink">Your Music</a>
                    </div><div class="navItem">
                        <a href="profile.php" class="navItemLink">Nerijus T.</a>
                    </div>
                </div>
            </nav>
        </div>
        
    </div>

    <!-- bottom Container -->
    <div id="nowPlayingBarContainer">
         <div id="nowPlayingBar">
    
            <div id="nowPlayingLeft">
                <div class="content">
                    <span class="albumLink">
                        <img src="assets/images/albumImg.jpg" alt="album">
                    </span>
    
                    <div class="trackInfo">
                        <span class="trackName">
                            <span>Happy Birthday</span>
                        </span>
                        <span class="artistName">
                            <span>Nerijus T.</span>
                        </span>
                    </div>
                </div>
            </div>
            
            <div id="nowPlayingCenter">
                <div class="content playerControls">
    
                    <div class="buttons">
    
                        <button class="controlButton shuffle" title="Shuffle button">
                            <img src="assets/images/icons/shuffle.png" alt="Shuffle">
                        </button>
                        
                        <button class="controlButton previous" title="Previous button">
                            <img src="assets/images/icons/previous.png" alt="Previous">
                        </button>
                        <button class="controlButton play" title="Play button">
                            <img src="assets/images/icons/play.png" alt="Play">
                        </button>
                        <button class="controlButton pause" title="Pause button">
                            <img src="assets/images/icons/pause.png" alt="Pause" style="display:none">
                        </button>
                        <button class="controlButton next" title="Next button">
                            <img src="assets/images/icons/next.png" alt="Next">
                        </button>
                        <button class="controlButton repeat" title="Repeat button">
                            <img src="assets/images/icons/repeat.png" alt="Repeat">
                        </button>
    
                    </div>
    
                    <div class="playBackBar">
                        <span class="progressTime current">0.00</span>
                        
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
    
                        <span class="progressTime remaining">0.01</span>
                    </div>
    
                </div>
            </div>
    
            <div id="nowPlayingRight">
    
                <div class="volumeBar">
                    
                    <button class="controlButton volume" title="Volume Button">
                        <img src="assets/images/icons/volume.png" alt="volume">
                    </button>
    
                    <div class="progressBar">
                        <div class="progressBarBg">
                            <div class="progress"></div>
                        </div>
                    </div>
    
                </div>
    
            </div>
            
         </div>
    </div>
</div> 
    

    
</body>
</html>