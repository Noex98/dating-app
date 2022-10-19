<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/UsersModel.php');

    
    $requestValid = (
        isset($_REQUEST['firstname']) &&
        isset($_REQUEST['lastname']) &&
        isset($_REQUEST['height']) &&
        isset($_REQUEST['birthday']) &&
        isset($_REQUEST['gender'])
    );

    if(!$requestValid){
        echo json_encode([
            'data' => null,
            'succes' => false,
            'errMessage' => 'Invalid request'
        ]);
    } else {
        $userModel->editUserProfile(
            $_REQUEST['firstname'],
            $_REQUEST['lastname'],
            $_REQUEST['height'],
            $_REQUEST['birthday'],
            $_REQUEST['gender'],
        );
        echo json_encode([
            'data' => null,
            'succes' => true,
            'errMessage' => ''
        ]);
    }

?>