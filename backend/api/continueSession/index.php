<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/UsersModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/allowCors.php');

    $id = $authModel->authenticate();

    if($id){
        var_dump($userModel->getUser($id));
        /*
        echo json_encode([
            'data' => $userModel->getUser($id),
            'succes' => true,
            'errMessage' => ''
        ]);
        */
    } else {
        echo json_encode([
            'data' => null,
            'succes' => false,
            'errMessage' => 'Not logged in'
        ]);
    }

?>