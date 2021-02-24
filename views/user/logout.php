<?php

    session_start();
    
    include_once '../../config/userSession.php';

    $userSession = new userSession();    
    $userSession->closeSession();

    header('Location: ../../index.php');

?>