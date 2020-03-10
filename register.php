<?php 
    @include 'includes/config.php';
    @include 'includes/classes/Constants.php';
    @include 'includes/classes/Account.php';

    $account = new Account($con);

    @include 'includes/handlers/register.inc.php';
    @include 'includes/handlers/login.inc.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/register.css">

    <script
      src="https://code.jquery.com/jquery-3.4.1.js"
      integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
      crossorigin="anonymous"></script>
    <script src="assets/js/register.js"></script>
</head>
<body>

<script>
    $(document).ready(function() {
        $("#logInContainer").show();
        $("#registerContainer").hide();
    });
</script>

<?php if(isset($_POST['loginBtn'])) : ?>
    <script>
        $(document).ready(function() {
            $("#logInContainer").show();
            $("#registerContainer").hide();
        });
    </script>
<?php endif;?>
<?php if(isset($_POST['registerBtn'])) : ?>
    <script>
        $(document).ready(function() {
            $("#logInContainer").hide();
            $("#registerContainer").show();
        });
    </script>
<?php endif;?>

<div id="background">
    <div id="mainLoginAndRegisterCon">
        <div id="inputContainer">
            <div id="logInContainer">
                <h2 class="text-center my-4">Log In to Your Account</h2>
        
                <form method="POST" action="register.php">  
                    <div class="form-group">
                        <?php echo $account->getError(Constants::$loginFail);?>
                        <label for="loginUsername">Username</label>
                        <input type="text" class="form-control" id="loginUsername" name="loginUsername" placeholder="e.g. BartSimpson" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="loginPassword" placeholder="Your Password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="loginBtn">Log In</button>
                    <div class="hasAccountText">
                        <span id="hideLogin">Dont have a account yet? Sign up here</span>
                    </div>
                </form>
            </div>
            <br>
            <div id="registerContainer">
                <h2 class="text-center my-4">Create Free Account</h2>
                <form method="POST" action="register.php" id="registerForm">
                    <div class="form-group">
                        <?php echo $account->getError(Constants::$userNameShortLong) ?>
                        <?php echo $account->getError(Constants::$userNameTaken) ?>
                        <label for="userName">Username</label>
                        <input type="text" class="form-control" id="userName" name="userName" placeholder="e.g. BartSimpson" required>
                    </div>
                    <div class="form-group">
                        <?php echo $account->getError(Constants::$firstNameShortLong)?>
                        <label for="firstName">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="e.g. Bart" required>
                    </div>
                    <div class="form-group">
                        <?php echo $account->getError(Constants::$lastNameShortLong)?>
                        <label for="lastName">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="e.g. Simpson" required>
                    </div>
                    <div class="form-group">
                        <?php echo $account->getError(Constants::$emailNotMatch)?>
                        <?php echo $account->getError(Constants::$emailInvalid)?>
                        <?php echo $account->getError(Constants::$emailTaken)?>
                        <label for="email">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Bart.Simpson@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="email2">Email repeat</label>
                        <input type="text" class="form-control" id="email2" name="email2" placeholder="e.g. Bart.Simpson@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <?php echo $account->getError(Constants::$passwordNotMatch)?>
                        <?php echo $account->getError(Constants::$passwordAlphanumeric)?>
                        <?php echo $account->getError(Constants::$passwordShortLong)?>
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required>
                    </div>
                    <div class="form-group">
                        <label for="password2">Password repeat</label>
                        <input type="password" class="form-control" id="password2" name="password2" placeholder="Your Password"  required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block" name="registerBtn">Register</button>
                    <div class="hasAccountText">
                        <span id="hideRegister">Already have an account? Log in here</span>
                    </div>
                </form>
            </div>
        </div>
        
        <div id="loginTextRight">
            <h1>Get Great music, right now</h1>
            <h2>Listen to loads of songs for free</h2>
            <ul>
                <li>Discover music you fall in love with</li>
                <li>Create your own play list</li>
                <li>Follow artista to keep up to date</li>
            </ul>
        </div>
    </div>

</div>
    

</body>
</html>