<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/allowCors.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/getJsonBody.php');

    $req = getJsonBody();

    $requestValid = (
        !empty($req['username']) &&
        !empty($req['password']) &&
        !empty($req['firstname']) &&
        !empty($req['lastname']) &&
        !empty($req['height']) &&
        !empty($req['birthday']) &&
        !empty($req['gender'])
    );

    if(!$requestValid){
        echo json_encode([
            'data' => null,
            'succes' => false,
            'errMessage' => 'Invalid request: Must fill all fields'
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
        
    }
?>