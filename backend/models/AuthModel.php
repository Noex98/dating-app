<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/sqlConfig.php");

    class AuthModel {
        private $mySQL;

        public function __construct($mySQLConnection) {
            $this->mySQL = $mySQLConnection;
        }

        function registerUser(
            $username,
            $password,
            $firstname,
            $lastname,
            $height,
            $birthday,
            $gender,
            ){

            $encryptedPassword = password_hash($password, PASSWORD_DEFAULT);

            $q = "CALL RegisterUser('$username', '$encryptedPassword', '$firstname', '$lastname', '$height', '$birthday', '$gender')";
            $this->mySQL->query($q);
        }

        function logOut(){
            session_destroy();
        }

        function authorize($username, $password){

            $q = "SELECT * FROM userLogin WHERE username = '$username'";
            $res = $this->mySQL->query($q);
            while($row = $res->fetch_object()){
                $id = $row->id;
                $encryptedPassword = $row->password;
            }

            $loginSucces = password_verify($password, $encryptedPassword);

            return $loginSucces ? $id : false;
        }

        function authenticate(){
            if(!isset($_SESSION)){
                session_start();
            }
            return $_SESSION['authToken'] ? $_SESSION['authToken'] : false;
        }
    }

    $authModel = new AuthModel($mySQL);
?>