<?php
include($_SERVER['DOCUMENT_ROOT'] . '/models/UsersModel.php');
include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');

$id = $authModel->authenticate();

if ($id) {
    $requestValid = (isset($_REQUEST['firstname']) &&
        isset($_REQUEST['lastname']) &&
        isset($_REQUEST['height']) &&
        isset($_REQUEST['birthday']) &&
        isset($_REQUEST['gender'])
    );

    if (!$requestValid) {
        echo json_encode([
            'data' => null,
            'succes' => false,
            'errMessage' => 'Invalid request'
        ]);
    } else {
        $userModel->editUserProfile(
            $id,
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
} else {
    echo json_encode([
        'data' => null,
        'succes' => false,
        'errMessage' => 'Invalid request'
    ]);
}
