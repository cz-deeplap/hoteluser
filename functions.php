<?php
    define('DB_SEVER','localhost');
    define('DB_USER','root');
    define('DB_PASS','');
    define('DB_NAME','db_project');

    class DB_con {
        function __construct() {
            $conn = mysqli_connect(DB_SEVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if(mysqli_connect_errno()) {
                echo "Failed to connect to Mysqli : " . mysqli_connect_error();
            }
        }

        public function insert($username, $password, $firstname, $lastname) {
            $result = mysqli_query($this->dbcon, "INSERT INTO tb_user (username, password, firstname, lastname) VALUES('$username', '$password', '$firstname', '$lastname')");
            return $result;
        }
        

        public function fetchdata() {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_user");
            return $result;
        }
        
        public function fetchonerecord($userid) {
            $result = mysqli_query($this->dbcon, "SELECT * FROM tb_user WHERE id = '$userid'");
            return $result;
        }        

        public function update($username, $password, $firstname, $lastname, $userid) {
            $result = mysqli_query($this->dbcon,  "UPDATE tb_user SET 
            username = '$username',
            password = '$password',  
            firstname = '$firstname',
            lastname = '$lastname' WHERE id = '$userid'
            ");
            return $result;
        }        

        public function delete($userid) {
            $deleterecord = mysqli_query($this->dbcon, "DELETE FROM tb_user WHERE id='$userid' ");
            return $deleterecord;
        }

    }
?>