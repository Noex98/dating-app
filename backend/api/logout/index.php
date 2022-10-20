<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');
    include($_SERVER['DOCUMENT_ROOT'] . '/utils/allowCors.php');

    $authModel->logout();

    echo json_encode([
        'data' => null,
        'succes' => true,
        'errMessage' => ''
    ]);
?>