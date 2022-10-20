<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/models/UsersModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/allowCors.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/getJsonBody.php');

    $id = $authModel->authenticate();
    echo $id;
    
    $req = getJsonBody();
    $requestValid = (
        !empty($req['heightMin']) &&
        !empty($req['heightMax']) &&
        !empty($req['ageMin']) &&
        !empty($req['ageMax']) &&
        !empty($req['gender'])
    );
    
    if (!$requestValid) {
        echo json_encode([
            'data' => null,
            'succes' => false,
            'errMessage' => 'Invalid request: Must fill all fields'
        ]);
    } else {
        $userModel->setPreferences(
            $id,
            $req['heightMin'],
            $req['heightMax'],
            $req['ageMin'],
            $req['ageMax'],
            $req['gender']
        );
            echo json_encode([
        'data' => null,
        'succes' => true,
        'errMessage' => ''
    ]);
    }


