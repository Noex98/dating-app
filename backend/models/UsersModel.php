<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/sqlConfig.php");

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

    function getMatches($id)
    {
        $q = "SELECT * FROM preferences WHERE id = '$id'";
        $result = $this->mySQL->query($q);
        $preferences = mysqli_fetch_assoc($result);    
        $q ="CALL getPotentialMatches('" . $preferences['heightMin']."', '" .  $preferences['heightMax']."', '" . $preferences['ageMin']."', '" . $preferences['ageMax']."', '" . $preferences['gender']. "')"; 
        $result = $this->mySQL->query($q);
        while ($row = $result->fetch_object()) {
            $matches[] = $row;
        }
        return $matches;
    }


    function getUser($id){
        /*
        $q = "SELECT * FROM users INNER JOIN preferences ON users.id = preferences.id WHERE users.id = '$id'";
        $res = $this->mySQL->query($q);
        return $res->fetch_object();
        */

        $q = "SELECT * FROM users  WHERE id = '$id'";
        $res = $this->mySQL->query($q);
        $output = mysqli_fetch_assoc($res);

        $q = "SELECT * FROM preferences  WHERE id = '$id'";
        $res = $this->mySQL->query($q);
        $output['preferences'] = mysqli_fetch_assoc($res);
        return $output;
    }

    function editUserProfile($id, $firstname, $lastname, $birthday, $gender, $height)
    {
        $q = "CALL EditUserProfile( '$id', '$firstname', '$lastname', '$birthday', '$gender', '$height' )";
        $this->mySQL->query($q);
    }

    function setPreferences($id, $heightMin, $heightMax, $ageMin, $ageMax, $gender)
    {
        $q = "CALL `SetPreferences`('$id', '$heightMin', '$heightMax', '$ageMin', '$ageMax', '$gender');";
        $this->mySQL->query($q);
    }
    
}

$userModel = new UserModel($mySQL);
