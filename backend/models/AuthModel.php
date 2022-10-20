<?php
    include_once($_SERVER['DOCUMENT_ROOT'] . "/sqlConfig.php");

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
            $user = $res->fetch_object();

            if($user){
                $loginSucces = password_verify($password, $user->password);
                return $loginSucces ? $user->id : false;
            } else {
                return false;
            }
        }

        function authenticate(){
            if(!session_id()){
                session_start();
            }
            return isset($_SESSION['authToken']) ? $_SESSION['authToken'] : false;
        }
    }

    $authModel = new AuthModel($mySQL);
?>