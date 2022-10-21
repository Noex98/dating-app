<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/allowCors.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/getJsonBody.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/api/signup/utils.php');

    $req = getJsonBody();

    $allParamsExist = doesParamsExist($req);

    if(!$allParamsExist){
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