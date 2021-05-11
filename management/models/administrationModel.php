<?php

    include_once('../config/db.php');

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

        public function getUserId($idUser){
            $sql = "SELECT id_usuario, estado_usuario.estado, nombre_usuario, numero_documento, email, ultimo_acceso, roles.nombre_rol, nombres, apellidos, imagen, ruta_imagen, fecha_creacion, tipo_documento.tipo_documento 
                        FROM usuario
                    INNER JOIN estado_usuario ON usuario.id_estado = estado_usuario.id_estado
                    INNER JOIN roles ON usuario.id_rol = roles.id_rol
                    INNER JOIN tipo_documento ON usuario.id_tipo_documento = tipo_documento.id_tipo_documento
                        WHERE id_usuario = ?";
                try {
                    $query = $this->db->prepare($sql);
                    $query->bindParam(1, $idUser);
                    $query->execute();
                    $data = $query->fetchAll();
                    return $data;
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
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

        public function getCategory(){
            $categoria = array();
            $sql = "SELECT * FROM categoria";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        foreach($query->fetchAll() as $data){
                            $categoria[] = $data;
                        }
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
            return $categoria;
        }

        public function getEstateSales(){
            $estado = array();
            $sql = "SELECT * FROM estado_compra";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        foreach($query->fetchAll() as $data){
                            $estado[] = $data;
                        }
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
            return $estado;
        }

        public function addCategory($data){
            $sql = "INSERT INTO categoria (categoria) VALUES (?)";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute(array(
                        $data['category']
                    ));  
                    Database::disconnect();
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function deleteCategory($data){
            $sql = "DELETE FROM categoria WHERE id_categoria = ? ";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute(array($data));  
                    Database::disconnect();
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function getSales() {
            $sql = "SELECT id_detalle_ventas, EC.estado, CONCAT(C.nombres, ' ' , C.apellidos) AS Nombre_Cliente, V.fecha_compra, P.item, P.nombre_producto, cantidad, P.precio, P.precio * cantidad AS Total
                        FROM detalle_ventas AS DV
                            INNER JOIN ventas AS V ON DV.id_ventas = V.id_ventas
                            INNER JOIN cliente AS C ON V.id_cliente = C.id_cliente
                            INNER JOIN estado_compra AS EC ON DV.id_estado_compra = EC.id_estado_compra
                            INNER JOIN producto AS P ON DV.id_producto = P.id_producto
                    ORDER BY fecha_compra ASC";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                    $data = $query->fetchAll();
                return $data;
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function getFilter($dato) {
            if(isset($dato['code'])) {
                $sql = "SELECT id_detalle_ventas, EC.estado, CONCAT(C.nombres, ' ' , C.apellidos) AS Nombre_Cliente, V.fecha_compra, P.item, P.nombre_producto, cantidad, P.precio, P.precio * cantidad AS Total
                            FROM detalle_ventas AS DV
                                INNER JOIN ventas AS V ON DV.id_ventas = V.id_ventas
                                INNER JOIN cliente AS C ON V.id_cliente = C.id_cliente
                                INNER JOIN estado_compra AS EC ON DV.id_estado_compra = EC.id_estado_compra
                                INNER JOIN producto AS P ON DV.id_producto = P.id_producto
                            WHERE id_detalle_ventas = :codigo ORDER BY fecha_compra ASC";
                        $query = $this->db->prepare($sql);
                        $query->execute(array("codigo" => $dato['code']));
                        $data = $query->fetchAll();
                    return $data;
            }else if(isset($dato['status'])) {
                $sql = "SELECT id_detalle_ventas, EC.id_estado_compra, EC.estado, CONCAT(C.nombres, ' ' , C.apellidos) AS Nombre_Cliente, V.fecha_compra, P.item, P.nombre_producto, cantidad, P.precio, P.precio * cantidad AS Total
                            FROM detalle_ventas AS DV
                                INNER JOIN ventas AS V ON DV.id_ventas = V.id_ventas
                                INNER JOIN cliente AS C ON V.id_cliente = C.id_cliente
                                INNER JOIN estado_compra AS EC ON DV.id_estado_compra = EC.id_estado_compra
                                INNER JOIN producto AS P ON DV.id_producto = P.id_producto
                            WHERE EC.id_estado_compra = :estado ORDER BY fecha_compra ASC";
                        $query = $this->db->prepare($sql);
                        $query->execute(array("estado" => $dato['status']));
                        $data = $query->fetchAll();
                    return $data;
            }else if(isset($dato['item'])) {
                $sql = "SELECT id_detalle_ventas, EC.estado, CONCAT(C.nombres, ' ' , C.apellidos) AS Nombre_Cliente, V.fecha_compra, P.item, P.nombre_producto, cantidad, P.precio, P.precio * cantidad AS Total
                            FROM detalle_ventas AS DV
                                INNER JOIN ventas AS V ON DV.id_ventas = V.id_ventas
                                INNER JOIN cliente AS C ON V.id_cliente = C.id_cliente
                                INNER JOIN estado_compra AS EC ON DV.id_estado_compra = EC.id_estado_compra
                                INNER JOIN producto AS P ON DV.id_producto = P.id_producto
                            WHERE P.item LIKE '%" . $dato['item'] . "%' ORDER BY fecha_compra ASC";
                        $query = $this->db->prepare($sql);
                        $query->execute();
                        $data = $query->fetchAll();
                    return $data;
            }else if(isset($dato['client'])) {
                $sql = "SELECT id_detalle_ventas, EC.estado, CONCAT(C.nombres, ' ' , C.apellidos) AS Nombre_Cliente, V.fecha_compra, P.item, P.nombre_producto, cantidad, P.precio, P.precio * cantidad AS Total
                            FROM detalle_ventas AS DV
                                INNER JOIN ventas AS V ON DV.id_ventas = V.id_ventas
                                INNER JOIN cliente AS C ON V.id_cliente = C.id_cliente
                                INNER JOIN estado_compra AS EC ON DV.id_estado_compra = EC.id_estado_compra
                                INNER JOIN producto AS P ON DV.id_producto = P.id_producto
                            WHERE CONCAT(C.nombres, ' ' , C.apellidos) LIKE '%" . $dato['client'] . "%' ORDER BY fecha_compra ASC";
                        $query = $this->db->prepare($sql);
                        $query->execute();
                        $data = $query->fetchAll();
                    return $data;
            }else if(isset($dato['dateOne']) && isset($dato['dateTwo'])) {
                $sql = "SELECT id_detalle_ventas, EC.id_estado_compra, EC.estado, CONCAT(C.nombres, ' ' , C.apellidos) AS Nombre_Cliente, V.fecha_compra, P.item, P.nombre_producto, cantidad, P.precio, P.precio * cantidad AS Total
                            FROM detalle_ventas AS DV
                                INNER JOIN ventas AS V ON DV.id_ventas = V.id_ventas
                                INNER JOIN cliente AS C ON V.id_cliente = C.id_cliente
                                INNER JOIN estado_compra AS EC ON DV.id_estado_compra = EC.id_estado_compra
                                INNER JOIN producto AS P ON DV.id_producto = P.id_producto
                            WHERE V.fecha_compra BETWEEN :dateOne AND :dateTwo ORDER BY fecha_compra ASC";
                        $query = $this->db->prepare($sql);
                        $query->execute(array(
                                            "dateOne" => $dato['dateOne'],
                                            "dateTwo" => $dato['dateTwo'],
                                        ));
                        $data = $query->fetchAll();
                    return $data;   
            }               
        }
    }

?>