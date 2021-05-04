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

        public function getPermissionsByRol(){
            $permissions = array();
            $sql = "SELECT RP.id_permiso, R.nombre_rol, GROUP_CONCAT(P.permisos SEPARATOR ' - ') AS Permisos FROM roles_permisos AS RP 
                        INNER JOIN roles AS R ON RP.id_rol = R.id_rol
                        INNER JOIN permisos AS P ON RP.id_permiso = P.id_permiso
                    GROUP BY R.nombre_rol";
                try {
                    $query = $this->db->prepare($sql);
                    $query->execute();
                        while($row = $query->fetch()){
                            $this->permissions[] = $row;
                        }
                    return $this->permissions;
                }catch (PDOExeption $e) {
                    echo "Revise el siguiente error " . $e->getMessage();
                }
        }
    }
?>