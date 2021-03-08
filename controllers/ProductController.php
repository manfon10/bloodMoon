<?php

    require_once("../models/productModel.php");

    class ProductController {

        //atributo para poder acceder a los metodos de la clase productModel.
        private $modelProduct;

            //Constructor para poder instanciar la clase del modelo.
            public function __construct(){
                //Instancia de la clase productModel, para poder llamar los metodos.
                $this->modelProduct = new productModel();
            }

        public function index(){
            $data = $this->modelProduct->getProducts();
            require_once("../views/header.php");
            require_once("../views/product/product.php");
            require_once("../views/footer.php");
        }

        public function create(){
            $data['category'] = $this->modelProduct->getCategory();
            require_once("../views/header.php");
            require_once("../views/product/product_add.php");
            require_once("../views/footer.php");
        }

        public function save(){

            $data['name']            = $_POST['nombreProducto'];         
            $data['imageProduct']    = $_FILES['image']['name'];
            $data['size']            = $_POST['size'];
            $data['description']     = $_POST['description'];
            $data['price']           = $_POST['price'];
            $data['idCategory']      = $_POST['category'];
            $data['stock']           = $_POST['stock'];
            $data['dateAdd']         = $_POST['dateAdd'];
            $data['item']            = $_POST['item'];

            $archiveImg = $_FILES['image']['name'];

            if(isset($archiveImg) && $archiveImg != "" ){
                $type = $_FILES['image']['type'];
                $size = $_FILES['image']['size'];
                $temp = $_FILES['image']['tmp_name'];
                    if(!((strpos($type, "jpeg") || strpos($type, "jpg") || strpos($type, "png") && ($size < 2000000)))){
                        $error = "El archivo o imagen " . $type . " esta erronea, vuelva a subirlo, gracias. ";
                        header("Location: index.php?menu=product&action=create");
                    }else {
                        if(move_uploaded_file($temp, '../uploads/_pictureProducts/' . $archiveImg)){
                            chmod('../uploads/_pictureProducts/' . $archiveImg, 0777);
                        }else {
                            $error = "Ocurrio un error al subir la imagen, por favor intente de nuevo.";
                            header("Location: index.php?menu=product&action=create");
                        }
                    }
            }

            $routeImage    = 'uploads/_pictureProducts/' . $archiveImg;
            $data['route'] = $routeImage;

            if(isset($_POST['addProduct'])){
                $this->modelProduct->addProduct($data);
                header("Location: index.php?menu=product");
            }

            if(isset($_POST['updateProduct'])){
                $data['imageProduct'] = $_POST['image'];
                $idProduct            = array("idProduct" => $_GET['idProduct']);
                $this->modelProduct->updateProduct($data, $idProduct);
                header("Location: index.php?menu=product");
            }            
        }
        
        public function edit(){
            if(empty($_POST['idProduct'])){
                $error = "No hay nada que mostrar.";
                require_once("../views/header.php");
                include_once("../views/product/product_edit.php");
                require_once("../views/footer.php");
            }else{
                $data             = $this->modelProduct->getIdProduct($_POST['idProduct']);
                $data['category'] = $this->modelProduct->getCategory();
                require_once("../views/header.php");
                include_once("../views/product/product_edit.php");
                require_once("../views/footer.php");
            }
        }

        public function delete(){
            $id_producto = $_GET['idProduct'];
            if(isset($_GET['idProduct'])){
                $data = $this->modelProduct->deleteProduct($id_producto);
                header("Location: index.php?menu=product");
            }
        }

        public function search(){
            if(isset($_POST['searchDate'])){
                if(empty($_POST['searchDateOne']) && empty($_POST['searchDateTwo'])){
                    $error = "no hay nada";
                    $data  = "";
                    require_once("../views/header.php");
                    include_once("../views/product/product.php");
                    require_once("../views/footer.php");
                }else {
                    $data = $this->modelProduct->searchByDate($_POST['searchDateOne'], $_POST['searchDateTwo']);
                    require_once("../views/header.php");
                    include_once("../views/product/product.php");
                    require_once("../views/footer.php");
                }
            }else if(isset($_POST['searchItem'])){
                if(empty($_POST['itemProduct'])){
                    $error = "";
                    $data  = "";
                    require_once("../views/header.php");
                    include_once("../views/product/product.php");
                    require_once("../views/footer.php");
                }else {
                    $data = $this->modelProduct->searchByItem($_POST['itemProduct']);
                    $data = "";
                    require_once("../views/header.php");
                    include_once("../views/product/product.php");
                    require_once("../views/footer.php");
                }
            }else if(isset($_POST['searchPatron'])){
                if(empty($_POST['patron']) && empty($_POST['valorPatron'])){
                    $error = "no hay nada";
                    $data  = "";
                }else {
                    $patron = $_POST['patron'];
                    $valor  = $_POST['valorPatron'];
                    $data   = $this->modelProduct->searchByPatron($patron, $valor);
                    require_once("../views/header.php");
                    include_once("../views/product/product.php");
                    require_once("../views/footer.php");
                }
            }
        }

    }
?>