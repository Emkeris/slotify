<?php 
    class Album {
        private $con;
        private $id;
        private $artistId;
        private $title;
        private $genre;
        private $artworkPath;

        public function __construct($con, $id) {
            $this->con = $con;
            $this->id = $id;

            $query = mysqli_query($this->con, "SELECT * FROM albums WHERE id='$this->id'") or die(mysqli_error($this->con));
            $album = mysqli_fetch_assoc($query);

            $this->artistId = $album['artist'];
            $this->genre = $album['genre'];
            $this->artworkPath = $album['artworkPath'];
            $this->title = $album['title'];

        }

        public function getTitle(){
            return $this->title;
        }

        public function getGenre() {
            return $this->genre;
        }

        public function getArtworkPath() {
            return $this->artworkPath;
        }
        public function getArtist(){
            return new Artist($this->con, $this->artistId);    
        }

        public function getNumberOfSongs() {
            $query = mysqli_query($this->con, "SELECT id FROM songs WHERE album = '$this->id'") or die(mysqli_error($this->con));
            return mysqli_num_rows($query);
        }


    }
?>