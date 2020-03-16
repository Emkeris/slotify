<?php 
    class Artist {
        private $con;
        private $id;

        public function __construct($con, $id) {
            $this->con = $con;
            $this->id = $id;
        }

        public function getName() {
            $artistQuery = mysqli_query($this->con, "SELECT name FROM artist WHERE id='$this->id'") or die(mysqli_error($this->con));
            $artist = mysqli_fetch_assoc($artistQuery);
            return $artist['name'];
        }
    }
?>