<?php

    require_once("../models/administrationModel.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $modelo = new administrationModel();
        if($_POST['data'] == 'view_user'){
            $data = $modelo->getUser();
            include_once('../views/administration/view_user.php');
        }else if($_POST['data'] == 'view_category'){
            $data = $modelo->getCategory();
            if($data != []) {
                include_once('../views/administration/view_category.php');
            }else {
                $error = "No hay Datos Disponibles.";
                include_once('../views/administration/view_category.php');
            }
            
        }
    }

?>