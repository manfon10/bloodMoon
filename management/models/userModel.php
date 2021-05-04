<?php

    class UserModel {

        public $id_user;
        public $userName;
        public $password;
        public $names;
        public $surnames;
        public $rol;

            public function __construct(){
                $this->db = Database::connect();
            }

            public function getId(){
                return $this->id_user;
            }

            public function getNames(){
                return $this->names;
            }

            public function getSurNames(){
                return $this->surnames;
            }

            public function getRol(){
                return $this->rol;
            }
            
            public function userExists($data){
                $sql = "SELECT count(*) valor FROM usuario WHERE nombre_usuario = ? AND contraseña = ? ";
                    try {
                        $query = $this->db->prepare($sql);
                        $query->execute(array(
                            $data->userName, md5($data->password)
                        ));  
                        return $query->fetch(PDO::FETCH_OBJ);                    
                    }catch (PDOExeption $e) {
                        echo "Revise el siguiente error " . $e->getMessage();
                    }
            }

            public function validateState($data) {
                $sql = "SELECT count(*) estado FROM usuario WHERE nombre_usuario = :usuario AND id_estado = '1' ";
                    try {
                        $query = $this->db->prepare($sql);
                        $params = array("usuario" => $data->userName);
                        $query->execute($params);  
                        return $query->fetch(PDO::FETCH_OBJ);                  
                    }catch (PDOExeption $e) {
                        echo "Revise el siguiente error " . $e->getMessage();
                    }
            }

            public function setUser($data){
                $currentUser = array();
                $sql = "SELECT * FROM usuario WHERE nombre_usuario = '$data->userName'";
                    try {
                        $query = $this->db->prepare($sql);
                        $query->execute();

                        foreach($query->fetchAll() as $currentUser){
                            $this->id_user = $currentUser['id_usuario'];
                            $this->userName = $currentUser['nombre_usuario'];
                            $this->names = $currentUser['nombres'];
                            $this->surnames = $currentUser['apellidos'];
                            $this->rol = $currentUser['id_rol'];
                        }
                    }catch (PDOException $ex) {
                        Database::disconnect(); 
                        echo "Comprueba el siguiente error :" . $ex->getMessage();
                    }
                return $currentUser;
            }

            public function updateLogin($date, $data) {
                $sql = "UPDATE usuario SET ultimo_acceso = :fecha WHERE nombre_usuario = :usuario ";
                    try {
                        $query = $this->db->prepare($sql);
                        $params = array(
                            "fecha" => $date, 
                            "usuario" => $data->userName
                        );
                        $query->execute($params);
                        Database::disconnect();                  
                    }catch (PDOExeption $e) {
                        echo "Revise el siguiente error " . $e->getMessage();
                    }
            }
    }


?>