
<div class="containerFormsAdministration">
    <div class="divFormAdministration">
        <a href="index.php?menu=administration&action=create"><button class="buttonSave" name="addUser"><i class="fa fa-plus"></i> Agregar</button></a>
            <form action="index.php?menu=administration&action=edit" method="POST">
                <button name="editUser" class="buttonEdit" style="float:left;"><i class="fa fa-edit"></i> Editar</button>
                    <table id="table_users" class="tableProducts" style="width:98%;">
                        <thead class="tableHead">
                            <tr>
                                <th></th>
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
                                        <td style="width:10px;"><input type="checkbox" name="id_usuario" value="<?php echo $dato['id_usuario']; ?>"></td>
                                        <td><?php echo $dato['id_usuario']; ?></td>
                                        <td><?php echo $dato['nombre_usuario']; ?></td>
                                        <td><?php echo $dato['estado']; ?></td>
                                        <td><?php if($dato['ultimo_acceso'] != ""){ echo $dato['ultimo_acceso'];} else {echo "No Tiene Registro";} ?></td>
                                        <td><?php echo $dato['nombre_rol']; ?></td>
                                        <td>
                                            <?php if($dato['imagen'] != "") { ?>
                                                <img src="../uploads/_pictureUsers/<?php echo $dato['imagen']; ?>" alt="" style="width:50px;">
                                            <?php } else { ?>
                                                <img src="../img/img_user_default.png" alt="" style="width:50px;">
                                            <?php } ?>    
                                        </td>
                                        <td style="width:15%;">
                                            <a href="index.php?menu=administration&action=delete&idUser=<?php echo $dato['id_usuario'];?>" ><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                        </tbody>
                    </table>
            </form>
        </div>
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