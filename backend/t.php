<?php 
    session_start();
    $_SESSION['test'] = '2';

    var_dump($_SESSION);
?>