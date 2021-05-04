<?php

    require_once("controllers/UserController.php");
    require_once("config/db.php");

    $controller = new UserController();
    
    if(!isset($_GET['redirec'])){
        $controller->index();
    }else {
        $action = $_GET['redirec'];
        call_user_func(array($controller, $action));
    }
?>