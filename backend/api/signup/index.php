<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/allowCors.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/getJsonBody.php');

    $req = getJsonBody();

    $requestValid = (
        isset($req['username']) &&
        isset($req['password']) &&
        isset($req['firstname']) &&
        isset($req['lastname']) &&
        isset($req['height']) &&
        isset($req['birthday']) &&
        isset($req['gender'])
    );

    if(!$requestValid){
        echo json_encode([
            'data' => null,
            'succes' => false,
            'errMessage' => 'Invalid request'
        ]);
        
    } else {
        $authModel->registerUser(
            $req['username'],
            $req['password'],
            $req['firstname'],
            $req['lastname'],
            $req['height'],
            $req['birthday'],
            $req['gender'],
        );
        echo json_encode([
            'data' => null,
            'succes' => true,
            'errMessage' => ''
        ]);
    }
?>