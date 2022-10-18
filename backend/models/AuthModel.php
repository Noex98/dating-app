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

            $q = "CALL RegisterUser('$firstname', '$lastname', '$height', '$username', '$encryptedPassword')";
            $this->mySQL->query($q);
        }

        function logOut(){
            session_destroy();
        }

        function authorize($username, $password){

            $q = "SELECT id FROM userprofile WHERE username = '$username'";
            $res = $this->mySQL->query($q);
            while($row = $res->fetch_object()){
                $id = $row->id;
            }

            $q = "SELECT * FROM userlogin WHERE id = '$id'";
            $res = $this->mySQL->query($q);
            while($row = $res->fetch_object()){
                $encryptedPassword = $row->user_password;
            }

            $loginSucces = password_verify($password, $encryptedPassword);

            if ($loginSucces){
                if(!isset($_SESSION)){
                    session_start();
                }
                $_SESSION['authToken'] = $id;
            }

            return $loginSucces;
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