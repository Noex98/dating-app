<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/models/UsersModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/allowCors.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/getData.php');

    $req = getJsonBody();
    
    $requestValid = (
        isset($req['username']) &&
        isset($req['password'])
    );

    if(!$requestValid){
        echo json_encode([
            'data' => null,
            'succes' => false,
            'errMessage' => 'Invalid request'
        ]);
    } else {
        $loginSucces = $authModel->authorize(
            $req['username'],
            $req['password'],
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