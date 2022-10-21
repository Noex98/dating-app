<?php 
    function doesParamsExist($req){
        return (
            !empty($req['username']) &&
            !empty($req['password']) &&
            !empty($req['firstname']) &&
            !empty($req['lastname']) &&
            !empty($req['height']) &&
            !empty($req['birthday']) &&
            !empty($req['gender'])
        );
    }
?>