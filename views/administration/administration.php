<div class="container">
    <div class="containerOption">
        <div class="containerButtonsOptions">
            <div class="buttonsAdministration">
                <button><i class="fa fa-user"></i> Usuarios</button>
            </div>
            <div class="buttonsAdministration">
                <button><i class="fa fa-plus"></i> Editar Reportes</button>
            </div>
        </div>
    </div>
    <div class="formUser">
        <div style="padding-left:1.9em;">
            <a href="index.php?menu=administration&action=create"><button class="buttonSave"><i class="fa fa-plus"></i> Agregar</button></a>
        </div>
            <div class="containerFormsAdministration">
                <table id="table_users"  class="tableProducts display">
                    <thead class="tableHead">
                        <tr>
                            <th>Id</th>
                            <th>Nombre Usuario</th>
                            <th>Estado</th>
                            <th>Ultimo Acceso</th>
                            <th>Rol</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead> 
                    <tbody class="tableBody">
                        <?php if($data != "") : ?>
                            <?php foreach ($data as $dato) : ?>
                                <tr>
                                    <td><?php echo $dato['id_usuario']; ?></td>
                                    <td><?php echo $dato['nombre_usuario']; ?></td>
                                    <td><?php echo $dato['estado']; ?></td>
                                    <td><?php echo $dato['ultimo_acceso']; ?></td>
                                    <td><?php echo $dato['nombre_rol']; ?></td>
                                    <td><img src="../uploads/_pictureUsers/<?php echo $dato['imagen']; ?>" style="width:50px; height:50px;"></td>
                                    <td style="width:15%;">
                                        <a href="index.php?menu=administration&action=delete&idUser=<?php echo $dato['id_usuario'];?>" ><i class="fa fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                    </tbody>
                </table>
                    <?php else : ?>
                        <div class="containerFormEdit">
                            <div class="alertWarning">
                                <div class="contentWarning">
                                    <i class="fa fa-exclamation-triangle"></i> <?php if(isset($error)){
                                        echo $error;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
            </div>
        </div>
</div>