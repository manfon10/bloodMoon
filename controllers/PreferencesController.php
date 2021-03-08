<?php

    class PreferencesController {

        //private $modelCentral;

            //public function __construct(){
                //$this->modelCentral = new centralModel();
            //}

        public function index(){
            require_once("../views/header.php");
            include_once('../views/user/user.php');
            require_once("../views/footer.php");
        }

    }


?>