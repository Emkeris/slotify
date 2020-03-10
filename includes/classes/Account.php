<?php 
    class Account {

        private $con;
        private $errorArray;

        public function __construct($con) {
            $this->con = $con;
            $this->errorArray = array();
        }

// LOGIN BACKEND
        public function logIn($un, $pw) {
            $this->validateLogin($un, $pw);

            if(empty($this->errorArray)) {
                return true;
            } else {
                return false;
            }
        }

        private function validateLogin($input, $input2) {
            $input2 = md5($input2);

            $loginResult = mysqli_query($this->con, "SELECT * FROM users WHERE userName = '$input' AND password = '$input2'") or die(mysqli_error($this->con));
            if(mysqli_num_rows($loginResult) != 1) {
                array_push($this->errorArray, Constants::$loginFail);
                return;
            }
            
        }

// REGISTER BACKEND
        public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
            $this->validateUsername($un);
            $this->validateFirstName($fn);
            $this->validateLastName($ln);
            $this->validateEmails($em, $em2);
            $this->validatePasswords($pw, $pw2);

            if(empty($this->errorArray)) {
                // instert data to DB;
                $this->insertUserDetails($un, $fn, $ln, $em, $pw);
                return true;
            } else {
                return false;
            }
        }
        
        public function getError($error) {
            if(!in_array($error, $this->errorArray)) {
                $error = "";
            }
            return "<span class='errorMessage'>$error</span>";
        }

        private function insertUserDetails($un, $fn, $ln, $em, $pw){
            $pw = md5($pw);
            $profilePic = "assets/images/profilePicks/profilePic.png";
            $date = date('Y-m-d');

            mysqli_query($this->con, "INSERT INTO users (userName, firstName, lastName, email, password, signUpDate, profilePic) VALUES ('$un', '$fn', '$ln', '$em', '$pw', '$date', '$profilePic')") or die(mysqli_error($this->con));
        }

        private function validateUsername($input) {
            if(strlen($input) > 25 || strlen($input) < 5) {
                array_push($this->errorArray, Constants::$userNameShortLong);
                return;
            }   

            // checking if user is in DB
            $result = mysqli_query($this->con, "SELECT * FROM users WHERE userName = '$input'") or die(mysqli_error($this->con)); 
            if(mysqli_num_rows($result) != 0) {
                array_push($this->errorArray, Constants::$userNameTaken);
                return;
            }
        }

        private function validateFirstName($input) {
            if(strlen($input) > 25 || strlen($input) < 3) {
                array_push($this->errorArray, Constants::$firstNameShortLong);
                return;
            } 
        }

        private function validateLastName($input) {
            if(strlen($input) > 25 || strlen($input) < 3) {
                array_push($this->errorArray, Constants::$lastNameShortLong);
                return;
            } 
        }

        private function validateEmails($input, $input2) {
            if($input != $input2) {
                array_push($this->errorArray, Constants::$emailNotMatch);
                return;
            }

            if(!filter_var($input, FILTER_VALIDATE_EMAIL)) {
                array_push($this->errorArray, Constants::$emailInvalid);
                return;
            }

            // Checks if email is taken;
            $result = mysqli_query($this->con, "SELECT * FROM users WHERE email = '$input'") or die(mysqli_error($this->con)); 
            if(mysqli_num_rows($result) != 0) {
                array_push($this->errorArray, Constants::$emailTaken);
                return;
            }
        }

        private function validatePasswords($input, $input2) {
            if($input != $input2) {
                array_push($this->errorArray, Constants::$passwordNotMatch);
                return;
            }

            if(!preg_match("/[A-Za-z0-9]+/", $input)) {
                array_push($this->errorArray, Constants::$passwordAlphanumeric);
                return;
            }

            if(strlen($input) > 25 || strlen($input) < 5) {
                array_push($this->errorArray, Constants::$passwordShortLong);
                return;
            }
        }



    }   


?>