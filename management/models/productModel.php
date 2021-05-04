<?php

    class productModel {

        private $db;
        private $products;

        public function __construct(){
            $this->db = Database::connect();
        }

        public function getProducts(){
            $producto = array();
            $sql = "SELECT * FROM producto ORDER BY id_producto ASC";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        foreach ($query->fetchAll() as $data) {
                            $producto[] = $data;
                        }
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
            return $producto;
        }

        public function getCategory(){
            $sql = "SELECT * FROM categoria";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        while($row = $query->fetch()){
                            $this->category[] = $row;
                        }
                    return $this->category;
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function getIdProduct($idProduct){
            $sql = "SELECT id_producto, nombre_producto, imagen, talla, descripcion, precio, categoria.categoria, fecha_agregado, stock, item, ruta_imagen 
                        FROM producto 
                        INNER JOIN categoria 
                        ON producto.id_categoria = categoria.id_categoria
                    WHERE id_producto = ? ";
                try {
                    $query = $this->db->prepare($sql);
                    $query->bindParam(1, $idProduct);
                    $query->execute();
                    $data = $query->fetch();
                    return $data;
                Database::disconnect();
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function addProduct($data){
            $sql = "INSERT INTO producto (nombre_producto, imagen, talla, descripcion, precio, id_categoria, stock, fecha_agregado, item, ruta_imagen) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute(array($data['name'], $data['imageProduct'], $data['size'], $data['description'], $data['price'], $data['idCategory'], $data['stock'], $data['dateAdd'], $data['item'], $data['route']));  
                    Database::disconnect();
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function updateProduct($data, $idProduct){
            $sql = "UPDATE producto SET nombre_producto = ?, imagen = ?, talla = ?, descripcion = ?, precio = ?, id_categoria = ?, stock = ?, fecha_agregado = ?, item = ?, ruta_imagen = ? WHERE id_producto = ? ";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute(array($data['name'], $data['imageProduct'], $data['size'], $data['description'], $data['price'], $data['idCategory'], $data['stock'], $data['dateAdd'], $data['item'], $data['route'], $idProduct['idProduct']));
                    Database::disconnect();
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function deleteProduct($data){
            $sql = "DELETE FROM producto WHERE id_producto = ? ";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute(array($data));  
                    Database::disconnect();
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function searchByDate($dateOne, $dateTwo) {
            $producto = array();
            $sql = "SELECT * FROM producto WHERE fecha_agregado BETWEEN ? AND ? ORDER BY fecha_agregado ASC";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute(array($dateOne, $dateTwo));
                        foreach ($query->fetchAll() as $data) {
                            $producto[] = $data;
                        }
                    return $producto;
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function searchByItem($item) {
            $sql = "SELECT * FROM producto WHERE item = ?";
                try {
                    $query = $this->db->prepare($sql);
                    $query->bindParam(1, $item);
                    $query->execute();
                    $data = $query->fetchAll();
                return $data;
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

        public function searchByPatron($patron, $valor) {
            $sql = "SELECT * FROM producto WHERE $patron LIKE '%".$valor."%'";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                    $data = $query->fetchAll();
                return $data;
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }
    }
?>