<?php

    class administrationModel {

        private $db;

        public function __construct(){
            $this->db = Database::connect();
        }

        public function getUser(){
            $user = array();
            $sql = "SELECT id_usuario, estado_usuario.estado, nombre_usuario, numero_documento, email, ultimo_acceso, roles.nombre_rol, nombres, apellidos, imagen, ruta_imagen, fecha_creacion, tipo_documento.tipo_documento 
                        FROM usuario
                    INNER JOIN estado_usuario ON usuario.id_estado = estado_usuario.id_estado
                    INNER JOIN roles ON usuario.id_rol = roles.id_rol
                    INNER JOIN tipo_documento ON usuario.id_tipo_documento = tipo_documento.id_tipo_documento;";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                    sleep(1);
                        foreach ($query->fetchAll() as $data) {
                            $user[] = $data;
                        }
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
            return $user;
        }

        public function addUser($data){
            $sql = "INSERT INTO usuario (id_estado, nombre_usuario, numero_documento, email, contraseña, id_rol, nombres, apellidos, imagen, ruta_imagen, fecha_creacion, id_tipo_documento) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute(array(
                        $data['status'], 
                        $data['username'],
                        $data['documet'], 
                        $data['email'], 
                        $data['pass'], 
                        $data['rol'], 
                        $data['names'], 
                        $data['surnames'], 
                        $data['imageUser'], 
                        $data['route'], 
                        $data['dateAdd'], 
                        $data['typeDocument']
                    ));  
                    Database::disconnect();
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function deleteUser($data){
            $sql = "DELETE FROM usuario WHERE id_usuario = ? ";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute(array($data));  
                    Database::disconnect();
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function getTypeDocument(){
            $sql = "SELECT * FROM tipo_documento";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        while($row = $query->fetch()){
                            $this->type[] = $row;
                        }
                    return $this->type;
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function getStatusUser(){
            $sql = "SELECT * FROM estado_usuario";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        while($row = $query->fetch()){
                            $this->status[] = $row;
                        }
                    return $this->status;
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function getRol(){
            $sql = "SELECT * FROM roles";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        while($row = $query->fetch()){
                            $this->rol[] = $row;
                        }
                    return $this->rol;
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }
    }

?>