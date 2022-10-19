<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    
    $requestValid = (
        isset($_REQUEST['username']) &&
        isset($_REQUEST['password']) &&
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
        $authModel->registerUser(
            $_REQUEST['username'],
            $_REQUEST['password'],
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