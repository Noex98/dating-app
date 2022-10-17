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

                $q = "SELECT * FROM userprofile INNER JOIN userSettings ON userprofile.id = userSettings.id WHERE userprofile.id = '$currentUserId'";
                $res = $this->mySQL->query($q);
                return $res->fetch_object();
            }
        }

        function editUserProfile($column, $value){
            if(!isset($_SESSION)){
                session_start();
            }
            if (isset($_SESSION['authToken'])){
                $currentUserId = $_SESSION['authToken'];
                $q = "UPDATE userprofile SET $column = '$value' WHERE id = '$currentUserId';";
                $this->mySQL->query($q);
            }
        }
    }

    $userModel = new UserModel($mySQL);
?>