<?php

    function loadController($controller){ //$controller = product;
        $nameController = ucwords($controller) . "Controller"; //product -> ProductController
        $archiveController = '../controllers/' . ucwords($nameController) . 'Controller.php';

            if(!is_file($archiveController)){
                $archiveController = '../controllers/' . $controller . 'Controller.php';
            }

            require_once $archiveController;
            $control = new $nameController();
            
        return $control;
    }

    function loadAction($controller, $action){
        $accion = $action;
        $controller->$accion();
    }

    function throwAction($controller){
        if(isset($_GET['action']) && method_exists($controller, $_GET['action'])){
            loadAction($controller, $_GET['action']);
        }else {
            loadAction($controller, ACCION_PRINCIPAL);
        }
    }
?>