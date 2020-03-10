<?php 
     
     if(isset($_POST['loginBtn'])) {
        // login Btn pressed;
        $loginUsername = $_POST['loginUsername'];
        $loginPassword = $_POST['loginPassword'];

        $loginSuccess = $account->login($loginUsername, $loginPassword);

        if($loginSuccess) {
            $_SESSION['loggedUser'] = $loginUsername;
            header('Location: index.php');
        } 
    }


?>