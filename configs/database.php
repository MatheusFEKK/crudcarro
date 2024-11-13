<?php 


    Class database{
        private $host = 'localhost:3306';
        private $database = 'crudcarro';
        private $user = 'root';
        private $password = '10012019_Maria';
        public $conn;

        public function connect(){
            $this->conn = null;

            try{
                $this->conn = NEW PDO ("mysql:host=$this->host;dbname=$this->database", $this->user, $this->password);
            }catch (PDOException $error) {
                echo 'Connection Failed'. $error->getMessage();
            }
            return $this->conn;
        }
    }