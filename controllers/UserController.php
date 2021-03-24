<?php

    session_start();

    require_once("models/userModel.php");
    require_once("config/userSession.php");

    class UserController {

        public $userModel;

            public function __construct(){
                $this->userModel = new UserModel();
            }

            public function index(){
                require_once("views/login/login.php");
            }

            public function validate(){

                $data = new UserModel();
                $data->userName = $_POST['user'];
                $data->password = $_POST['pass'];
                        
                    $state = $this->userModel->validateState($data);
                        if($state->estado != 0){
                            $value = $this->userModel->userExists($data);
                                if($value->valor != 0){
                                    $userSession = new userSession();
                                    $userSession->setCurrentUser($data->userName);

                                    $this->userModel->setUser($data);
                                    $_SESSION['idUser']   = $this->userModel->getId();
                                    $_SESSION['names']    = $this->userModel->getNames();
                                    $_SESSION['surnames'] = $this->userModel->getSurNames();
                                    $_SESSION['access'] = 1 ;

                                    $date = date("Y-m-d H:i:s");
                                    $this->userModel->updateLogin($date, $data);

                                    header('Location: /inventory/views/index.php');
                                }else {
                                    $error = "Usuario o Contraseña Erroneos.";
                                    require_once("views/login/login.php");
                                }
                        }else {
                            $error = "Usuario Bloqueado o No Existe..";
                            require_once("views/login/login.php");
                    }
            }
    }


?>