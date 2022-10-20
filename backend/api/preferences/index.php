<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/models/UsersModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/allowCors.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/getJsonBody.php');

    $req = getJsonBody();

    
    $userModel->setPreferences(
        $req['id'],
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
