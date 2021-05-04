<?php

    class centralModel {

        private $db;

        public function __construct(){
            $this->db = Database::connect();
        }

        public function lastProductsAdd() {
            $product = array();
            $sql = "SELECT * FROM producto ORDER BY id_producto DESC LIMIT 6";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        foreach ($query->fetchAll() as $data) {
                            $product[] = $data;
                        }
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
            return $product;
        }

        public function getSalesPerMonth(){
            $series = array();
            $sql = "SELECT  MONTHNAME(fecha_compra) AS Mes, COUNT(fecha_compra) AS TotalVentasMes FROM ventas WHERE fecha_compra <= CURDATE() GROUP BY Mes ORDER BY fecha_compra ASC";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        foreach ($query->fetchAll() as $data) {
                            $series[] = $data;
                        }
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
            return $series;
        }

        public function getStatusSales() {
            $status = array();
            $sql = "SELECT EC.estado AS Estado, COUNT(estado) AS TotalEstados
                    FROM detalle_ventas AS DV
                        INNER JOIN estado_compra AS EC ON DV.id_estado_compra = EC.id_estado_compra
                        INNER JOIN ventas AS V ON DV.id_ventas = V.id_ventas
                    WHERE V.fecha_compra <= CURDATE() GROUP BY EC.estado ASC";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        foreach ($query->fetchAll() as $data) {
                            $status[] = $data;
                        }
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
            return $status;
        }
    }
?>