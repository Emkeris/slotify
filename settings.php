<?php 
    @include 'includes/includedFiles.php';
?>

<div class="entityInfo">
    <div class="centerSection">
        <div class="userInfo">
            <h1 class="usersName"><?php echo $userLoggedIn->getFirstAndLastname() ?></h1>
        </div>
    </div>
</div>

<div class="buttonItems">
    <button class="button" onclick="openPage('updateDetails.php')">User Detains</button>
    <button class="button" onClick="logOut()">Log Out</button>
</div>