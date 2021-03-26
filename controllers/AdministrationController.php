<?php

    require_once("../models/administrationModel.php");

    class AdministrationController {

        private $modelAdministration;

            public function __construct(){
                $this->modelAdministration = new administrationModel();
            }

        public function index(){
            require_once("../views/header.php");
            include_once('../views/administration/administration.php');
        }   

        public function create() {
            $data['type_document'] = $this->modelAdministration->getTypeDocument();
            $data['status_user'] = $this->modelAdministration->getStatusUser();
            $data['rol'] = $this->modelAdministration->getRol();
            require_once("../views/header.php");
            include_once('../views/administration/add_user.php');
        }

        public function save(){
            $data['names']          = $_POST['names']; 
            $data['surnames']       = $_POST['surnames'];            
            $data['typeDocument']   = $_POST['typeDocument'];
            $data['documet']        = $_POST['document'];
            $data['username']       = $_POST['username'];
            $data['pass']           = md5($_POST['password']);
            $data['email']          = $_POST['email'];
            $data['status']         = $_POST['status'];
            $data['rol']            = $_POST['rol'];
            $data['imageUser']      = $_FILES['image']['name'];
            $data['dateAdd']        = date("Y-m-d H:i:s");

            $archiveImg = $_FILES['image']['name'];

            if(isset($archiveImg) && $archiveImg != "" ){
                $type = $_FILES['image']['type'];
                $size = $_FILES['image']['size'];
                $temp = $_FILES['image']['tmp_name'];
                    if(!((strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png") && ($size < 2000000)))){
                        $error = "El archivo o imagen " . $type . " esta erronea, vuelva a subirlo, gracias. ";
                        header("Location: index.php?menu=administration&action=create");
                    }else {
                        if(move_uploaded_file($temp, '../uploads/_pictureUsers/' . $archiveImg)){
                            chmod('../uploads/_pictureUsers/' . $archiveImg, 0777);
                        }else {
                            $error = "Ocurrio un error al subir la imagen, por favor intente de nuevo.";
                            header("Location: index.php?menu=administration&action=create");
                        }
                    }
            }

            $routeImage    = 'uploads/_pictureUsers/' . $archiveImg;
            $data['route'] = $routeImage;

            if(isset($_POST['addUser'])){
                $this->modelAdministration->addUser($data);
                header("Location: index.php?menu=administration");
            }

            if(isset($_POST['updateUser'])){
                $data['imageUser'] = $_POST['image'];
                $idProduct            = array("idProduct" => $_GET['idProduct']);
                $this->modelProduct->updateProduct($data, $idProduct);
                header("Location: index.php?menu=product");
            } 
        }

        public function edit(){
            if(empty($_POST['id_usuario'])){
                $error = "No hay nada que mostrar.";
                require_once("../views/header.php");
                include_once("../views/administration/edit_user.php");
            }else{
                $data = $this->modelAdministration->getUserId($_POST['id_usuario']);
                require_once("../views/header.php");
                include_once("../views/administration/edit_user.php");
            }
        }

        public function delete(){
            $id_user = $_GET['idUser'];
            if(isset($_GET['idUser'])){
                $data = $this->modelAdministration->deleteUser($id_user);
                header("Location: index.php?menu=administration");
            }
        }

    }


?>