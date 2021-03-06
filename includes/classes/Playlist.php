<?php 
    class Playlist {
        private $con;
        private $id;
        private $name;
        private $owner;

        public function __construct($con, $data) {

            if(!is_array($data)) {
                // data is an ID string
                $query = mysqli_query($con, "SELECT * FROM playlists WHERE id = '$data'") or die(mysqli_error($con));
                $data = mysqli_fetch_array($query);
            } 

            $this->con = $con;
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->owner = $data['owner'];
            
        }

        public function getId() {
            return $this->id;
        }

        public function getName() {
            return $this->name;
        }

        public function getOwner() {
            return $this->owner;
        }

        public function getNumberOfSongs() {
            $query = mysqli_query($this->con, "SELECT songId FROM playlistSongs WHERE playlistId = '$this->id'") or die(mysqli_error($this->con));
            return mysqli_num_rows($query);
        }

        public function getSongsIds() {
            $query = mysqli_query($this->con, "SELECT songId FROM playlistSongs WHERE playlistId = '$this->id' ORDER BY playlistOrder ASC") or die(mysqli_error($this->con));
            $array = array();

            while($row = mysqli_fetch_assoc($query)) {
                array_push($array, $row['songId']);
            }

            return $array;
        }

        public static function getPlaylistsDropdown($con, $username) {
            $dropdown =     '<select class="item playlist" name="" id="">
                                <option value="">Add Playlist</option>';

            $query = mysqli_query($con, "SELECT id, name FROM playlists WHERE owner = '$username'");
            while ($row = mysqli_fetch_assoc($query)) {
                $id = $row['id'];
                $name = $row['name'];
                $dropdown = $dropdown . "<option value = '$id'>$name</option>";
            }

            return $dropdown . "</select>";
        }
    }
?>