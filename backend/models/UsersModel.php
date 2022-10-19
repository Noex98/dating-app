<?php
include($_SERVER['DOCUMENT_ROOT'] . "/sqlConfig.php");

class UserModel
{
    private $mySQL;

    public function __construct($mySQLConnection)
    {
        $this->mySQL = $mySQLConnection;
    }

    function getUsers($ammount)
    {
        $q = "SELECT * FROM userprofile ORDER BY id DESC LIMIT $ammount";
        $res = $this->mySQL->query($q);
        $users = [];

        while ($row = $res->fetch_object()) {
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

    function getMatches($ammount)
    {
        $q = "SELECT * FROM userprofile ORDER BY id DESC LIMIT $ammount";
        $res = $this->mySQL->query($q);
        $users = [];

        while ($row = $res->fetch_object()) {
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


    function getUser($id){
        $q = "SELECT * FROM users INNER JOIN preferences ON users.id = preferences.id WHERE users.id = '$id'";
        $res = $this->mySQL->query($q);
        return $res->fetch_object();
    }

    function editUserProfile($firstname, $lastname, $birthday, $gender, $height, $id)
    {
        $q = "CALL EditUserProfile( '$id', '$firstname', '$lastname', '$height', '$birthday', '$gender' )";
        $this->mySQL->query($q);
    }
}

$userModel = new UserModel($mySQL);
