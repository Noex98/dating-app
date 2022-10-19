<?php
    include($_SERVER['DOCUMENT_ROOT'] . "/sqlConfig.php");

    class UserModel {
        private $mySQL;

        public function __construct($mySQLConnection) {
            $this->mySQL = $mySQLConnection;
        }

        function getUsers($ammount){
            $q = "SELECT * FROM userprofile ORDER BY id DESC LIMIT $ammount";
            $res = $this->mySQL->query($q);
            $users = [];

            while($row = $res->fetch_object()){
                array_push($users, [
                    "id" => $row->id,
                    "firstname" => $row->firstname,
                    "lastname" => $row->lastname,
                    "email" => $row->email,
                    "username" => $row->username
                ]);
            }

            return $users;
        }

        function getCurrentUser(){
            if(!isset($_SESSION)){
                session_start();
            }
            if (isset($_SESSION['authToken'])){
                $currentUserId = $_SESSION['authToken'];

                $q = "SELECT * FROM users INNER JOIN preferences ON users.id = preferences.id WHERE users.id = '$currentUserId'";
                $res = $this->mySQL->query($q);
                return $res->fetch_object();
            }
        }

        function editUserProfile($firstname, $lastname, $birthday, $gender, $height, $id){
            if(!isset($_SESSION)){
                session_start();
            }
            if (isset($_SESSION['authToken'])){
                $id = $_SESSION['authToken'];
                $q = "CALL EditUserProfile( '$id', '$firstname', '$lastname', '$birthday', '$gender', '$height')";
                $this->mySQL->query($q);
            }
        }
    }

    $userModel = new UserModel($mySQL);
?>