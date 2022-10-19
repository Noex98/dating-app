<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/models/UsersModel.php');

    
    $requestValid = (
        isset($_REQUEST['username']) &&
        isset($_REQUEST['password'])
    );

    if(!$requestValid){
        echo json_encode([
            'data' => null,
            'succes' => false,
            'errMessage' => 'Invalid request'
        ]);
    } else {
        $loginSucces = $authModel->authorize(
            $_REQUEST['username'],
            $_REQUEST['password'],
        );

        if(!$loginSucces){
            echo json_encode([
                'data' => null,
                'succes' => false,
                'errMessage' => 'Invalid user credentials'
            ]);
        } else {
            echo json_encode([
                'data' => $userModel->getCurrentUser(),
                'succes' => true,
                'errMessage' => ''
            ]);
        }
    }
?>