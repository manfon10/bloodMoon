<?php
    
    session_start();

    require_once('../controllers/RolController.php');

    class Security {

        public $rolController;

            public function __construct() {
                $this->rolController = new RolController();
            }

            public function validateAcces(){
                if($_SESSION['access'] != 1){
                    $error = "Por favor inicie sesion :')";
                    header('Location: ../index.php?redirec=index&msg=' . $error);
                    exit();
                }
            }

            public function validatePermissionsUser() {
                if($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $this->rolController->validatePermissions($_SESSION['rol_user'], $_GET['action'], $_GET['menu']);
                }else if($_SERVER['REQUEST_METHOD'] == 'GET') {
                    $this->rolController->validatePermissions($_SESSION['rol_user'], $_GET['action'], $_POST['menu']);
                }
            }
            
    }

    $security = new Security();
    $security->validateAcces();

    if(isset($_GET['action'])) {
        $security->validatePermissionsUser();
    }else if(isset($_POST['action'])) {
        $security->validatePermissionsUser();
    }

?>