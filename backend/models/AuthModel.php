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

            $q = "SELECT * FROM userLogin WHERE username = $username";
            $res = $this->mySQL->query($q);
            $row = mysqli_num_rows($res);
            if ($row < 1) { 
                $q = "CALL RegisterUser('$username', '$encryptedPassword', '$firstname', '$lastname', '$height', '$birthday', '$gender')";
                $this->mySQL->query($q);
                echo json_encode([
                    'data' => null,
                    'succes' => true,
                    'errMessage' => ''
                ]);
            } else 
            echo json_encode([
                'data' => null,
                'succes' => false,
                'errMessage' => 'Invalid request: User already exist'
            ]);
          
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
            if(!isset($_SESSION)){
                session_start();
            }
            return isset($_SESSION['authToken']) ? $_SESSION['authToken'] : false;
        }
    }

    $authModel = new AuthModel($mySQL);
?>