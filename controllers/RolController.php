<?php

    require_once("../models/rolModel.php");

    class RolController {

        private $rolModel;

            public function __construct() {
                $this->rolModel = new rolModel();
            }

            public function validatePermissions($id_rol, $id_permiso, $menu) {
                
                $data['id_rol'] = $id_rol;

                    if($id_permiso == 'create'){
                        $data['id_permiso'] = 4;
                    }

                    if($id_permiso == 'edit'){
                        $data['id_permiso'] = 1;
                    }

                    if($id_permiso == 'save'){
                        $data['id_permiso'] = 5;
                    }

                    if($id_permiso == 'delete'){
                        $data['id_permiso'] = 2;
                    }
                
                    $html = "";

                $state = $this->rolModel->validateRol($data);
                    if($state->estado != 0){
                        return true;
                    }else {
                        $html .= "<script>
                                    alert('No tiene permisos, consulte al Administrador..'); 
                                    window.location = 'index.php?menu=$menu';
                                 </script>";
                        echo $html;
                        exit(); 
                    }
            }
    }
?>