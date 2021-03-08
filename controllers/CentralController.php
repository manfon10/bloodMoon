<?php

    require_once("../models/centralModel.php");

    class CentralController {

        private $modelCentral;

            public function __construct(){
                $this->modelCentral = new centralModel();
            }

        public function index(){
            $data = $this->modelCentral->lastProductsAdd();
            $graph = $this->modelCentral->getSalesPerMonth();
            require_once("../views/header.php");
            include_once('../views/central/central.php');
            require_once("../views/footer.php");
        }

    }


?>