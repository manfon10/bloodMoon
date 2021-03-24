<?php

    require_once("../config/db.php");
    require_once("../core/routes.php");
    require_once("../config/global.php");
    
    if(isset($_GET["menu"])){
        $controller = loadController($_GET["menu"]);
            if(isset($_GET['action'])){
                throwAction($controller, $_GET['action']);
            }else {
                throwAction($controller, ACCION_PRINCIPAL);
            }
    }else {
        $controller = loadController(CONTROLADOR_PRINCIPAL);
        throwAction($controller);
    }
?>
