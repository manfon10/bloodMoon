<?php

    class RolModel {

        public function __construct(){
            $this->db = Database::connect();
        }

        public function validateRol($data) {
            $sql = "SELECT count(*) estado FROM roles_permisos WHERE id_rol = :id_rol AND id_permiso = :id_permiso ";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute(array(
                        "id_rol" => $data['id_rol'],
                        "id_permiso" => $data['id_permiso'],
                    ));
                    return $query->fetch(PDO::FETCH_OBJ);
                } catch (PDOException $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }

    }


?>