<?php 
    @include '../../config.php';

    if(!isset($_POST['username'])) {
        echo "ERROR: Could not set Username";
        exit();
    }

    if(!isset($_POST['oldPassword']) || !isset($_POST['newPassword1']) || !isset($_POST['newPassword2'])) {
        echo "ERROR: Not all passwords were set";
        exit();
    }

    if($_POST['oldPassword'] == "" || $_POST['newPassword1'] == "" || $_POST['newPassword2'] == "") {
        echo "Please fill all fields";
        exit();
    }

    $username = $_POST['username'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword1 = $_POST['newPassword1'];
    $newPassword2 = $_POST['newPassword2'];

    $oldMd5 = md5($oldPassword);

    $passwordCheck = mysqli_query($con, "SELECT * FROM users WHERE username = '$username' AND password = '$oldMd5'") or die(mysqli_error($con));

    if(mysqli_num_rows($passwordCheck) != 1) {
        echo "Password is incorrect";
        exit();
    }

    if($newPassword1 != $newPassword2) {
        echo "Passwords do not match";
        exit();
    }

    if(preg_match('/[^A-Za-z0-9]/', $newPassword1)){
        echo "Password must contain only letters and/or numbers";
        exit();
    }

    if(strlen($newPassword1) > 30 || strlen($newPassword1) < 5) {
        echo "Password be between 30 and 5 characters";
        exit();
    }

    $newMd5 = md5($newPassword1);

    $query = mysqli_query($con, "UPDATE users SET password='$newMd5' WHERE username = '$username'") or die(mysqli_error($con));
    echo "Password was update successfully;";
    
?>