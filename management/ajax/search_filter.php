<?php

    require_once("../models/administrationModel.php");

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $admin_model = new administrationModel();
        if(isset($_POST['code'])) {
            $dato['code'] = $_POST['code'];
            if(is_numeric($dato['code'])){
                $data = $admin_model->getFilter($dato);
                include_once('../views/administration/sales/form_filter_sales.php');
            }else {
                $error = "El codigo " . "<strong>" . $dato['code'] . "</strong>" . " no es un codigo valido o esta vacio, intente nuevamente.";
                include_once('../views/administration/sales/form_filter_sales.php');
            }
        }else if(isset($_POST['id_estus'])) {
            $dato['status'] = $_POST['id_estus'];
            if(is_numeric($dato['status'])){
                $data = $admin_model->getFilter($dato);
                include_once('../views/administration/sales/form_filter_sales.php');
            }else {
                $error = "El estado " . "<strong>" . $dato['status'] . "</strong>" . " no exite.";
                include_once('../views/administration/sales/form_filter_sales.php');
            }
        }else if(isset($_POST['item'])) {
            $dato['item'] = $_POST['item'];
            if(is_numeric($dato['item'])){
                $data = $admin_model->getFilter($dato);
                include_once('../views/administration/sales/form_filter_sales.php');
            }else {
                $error = "El item " . "<strong>" . $dato['item'] . "</strong>" . " contiene letras o esta vacio, porfavor validar.";
                include_once('../views/administration/sales/form_filter_sales.php');
            }
        }else if(isset($_POST['client'])) {
            $dato['client'] = $_POST['client'];
            if(!empty($dato['client'])){
                $data = $admin_model->getFilter($dato);
                include_once('../views/administration/sales/form_filter_sales.php');
            }else {
                $error = "El campo no debe ir vacio, por favor validar.";
                include_once('../views/administration/sales/form_filter_sales.php');
            }
        }else if(isset($_POST['dateOne']) && isset($_POST['dateTwo'])) {
            $dato['dateOne'] = $_POST['dateOne'];
            $dato['dateTwo'] = $_POST['dateTwo'];
            if(!empty($dato['dateOne']) && !empty($dato['dateTwo'])){
                $data = $admin_model->getFilter($dato);
                include_once('../views/administration/sales/form_filter_sales.php');
            }else {
                $error = "El campo no debe ir vacio, por favor validar.";
                include_once('../views/administration/sales/form_filter_sales.php');
            }
        }else {
            return false;
        }
    }

?>