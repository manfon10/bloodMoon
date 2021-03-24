<?php

require_once("../models/administrationModel.php");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['data'] == 'view_user'){
        $modelo = new administrationModel();
        $data = $modelo->getUser();
        include_once('../views/administration/view_user.php');
    }else if($_POST['data'] == 'test'){
        include_once('../views/administration/test.php');
    }
}

?>