<?php

    require_once("../models/administrationModel.php");
    require_once("../models/rolModel.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $admin_model = new administrationModel();
        if($_POST['data'] == 'view_user'){
            $data = $admin_model->getUser();
            include_once('../views/administration/view_user.php');
        }else if($_POST['data'] == 'view_category'){
            $data = $admin_model->getCategory();
            if($data != []) {
                include_once('../views/administration/view_category.php');
            }else {
                $error = "No hay Datos Disponibles.";
                include_once('../views/administration/view_category.php');
            }
        }else if($_POST['data'] == 'view_roles') {
            $rol_model = new RolModel();
            $rolesArray = $rol_model->getPermissionsByRol();
            $data = $rolesArray;
                if($data != []) {
                    include_once('../views/administration/view_rol.php');
                }else {
                    $error = "No hay Datos Disponibles.";
                    include_once('../views/administration/view_rol.php');
                }
        }
    }

?>