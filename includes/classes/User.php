<?php 
    class User {
        private $con;
        private $username;

        public function __construct($con, $username) {
            $this->con = $con;
            $this->username = $username;
        }

        public function getUsername() {
            return $this->username;
        }

        public function getFirstAndLastname() {
            $query = mysqli_query($this->con, "SELECT concat(firstName, ' ', lastName) as 'name' FROM users WHERE userName = '$this->username'") or die(mysqli_error($this->con));
            $row = mysqli_fetch_assoc($query);
            return $row['name'];
        }

        public function getEmail() {
            $query = mysqli_query($this->con, "SELECT email FROM users WHERE userName = '$this->username'") or die(mysqli_error($this->con));
            $row = mysqli_fetch_assoc($query); 
            return $row['email'];
        }

    }
?>