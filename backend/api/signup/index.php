<?php 
    include($_SERVER['DOCUMENT_ROOT'] . '/models/AuthModel.php');

    function cors() {
    
        // Allow from any origin
        if (isset($_SERVER['HTTP_ORIGIN'])) {
            // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
            // you want to allow, and if so:
            header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
            header('Access-Control-Allow-Credentials: true');
            header('Access-Control-Max-Age: 86400');    // cache for 1 day
        }
        
        // Access-Control headers are received during OPTIONS requests
        if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
            
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
                // may also be using PUT, PATCH, HEAD etc
                header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
            
            if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
                header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        
            exit(0);
        }
        
        echo "You have CORS!";
    }

    
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