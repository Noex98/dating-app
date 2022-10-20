<?php
    /*
    include($_SERVER['DOCUMENT_ROOT'] . "/models/UsersModel.php");
    session_start();
    
    if(isset($_POST["action"])){

        switch ($_POST["action"]){
            case "registerUser":
                $myUsersModel->registerUser(
                    $_POST["firstname"],
                    $_POST["lastname"],
                    $_POST["email"],
                    $_POST["username"],
                    $_POST["password"]
                );
                header("location: ./signupView.php");
                break;

            case "login":
                $loginSucces = $myUsersModel->authorize(
                    $_POST["username"],
                    $_POST["password"]
                );

                if ($loginSucces){
                    header("location: ./profile.php");
                } else {
                    header("location: ./login.php?errMessage=Wrong%20Login%20Credentials");
                }

                break;

            case "logout":
                $myUsersModel->logOut();
                header('location: ./login.php');
                break;

            case "updateAvatar":

                $file = $_FILES['file'];
                $targetFolder = $_SERVER['DOCUMENT_ROOT'] . "/storage/img/";
                $fileName = basename($file['name']);
                move_uploaded_file($file['tmp_name'], $targetFolder . $fileName);

                $myUsersModel->editUserProfile('profile_img', $fileName);

                header("location: ./profile.php");
                break;
        }

    }
    */
?>