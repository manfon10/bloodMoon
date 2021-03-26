<div class="container">
    <div class="optionsBar">
        <a href="index.php?menu=administration"><button class="buttonSave"><i class="fa fa-arrow-left"></i> Volver</button></a>
    </div>
    <?php if(isset($data) != "") { ?>
        <div class="containerFormEditUser">
            <div>
                <form action="index.php?menu=administration&action=save" class="border_table">
                    <?php foreach($data as $dato) : ?>
                        <div class="border_table_info">
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="7"><h3>Edición Usuario - <?php echo $dato['nombre_usuario']; ?></h3></th>
                                    </tr>  
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="border_info">
                                            <?php if($dato['imagen'] != "") { ?>
                                                <img src="../uploads/_pictureUsers/<?php echo $dato['imagen']; ?>" alt="" style="width:100px;">
                                            <?php } else { ?>
                                                <img src="../img/img_user_default.png" alt="" style="width:100px;">
                                            <?php } ?>
                                        </td>
                                        <td class="border_info" style="width:85%;">
                                            <p><strong>Rol: </strong><?php echo $dato['nombre_rol']; ?></p>
                                            <p style=""><strong>Estado Usuario: </strong>
                                            <?php if($dato['estado'] == "Activo") { ?>
                                                <?php echo $dato['estado'] . " " ; ?><img src="../img/activo.png" style="width:15px;">
                                                    <?php } else { ?>
                                                    <?php echo $dato['estado'] . " " ; ?> <img src="../img/inactivo.png" style="width:15px;">
                                                <?php } ?></p>
                                            <p><strong>Ultimo acceso : </strong><?php if($dato['ultimo_acceso'] != ""){ echo $dato['ultimo_acceso'];} else {echo "No Tiene Registro";} ?></p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="border_table_info">
                            <table>
                                <thead>
                                    <tr>
                                        <th colspan="7"><h3>Datos Usuario</h3></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="tdUser">
                                            <p>Nombres</p>
                                            <input type="text" name="names" value="<?php echo $dato['nombres']; ?>">
                                        </td>
                                        <td class="tdUser">
                                            <p>Apellidos</p>
                                            <input type="text" name="surnames" value="<?php echo $dato['apellidos']; ?>">
                                        </td>
                                        <td class="tdUser">
                                            <p>Correo Electronico</p>
                                            <input type="mail" name="email" value="<?php echo $dato['email']; ?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdUser">
                                            <p>Tipo de Documento</p>
                                            <select name="category">
                                                <option value="<?php echo $dato['tipo_documento']; ?>" <?php if($dato['tipo_documento'] == $dato['tipo_documento']) { echo "selected"; } ?> >
                                                    <?php echo $dato['tipo_documento']; ?>
                                                </option>
                                            </select>
                                        </td>
                                        <td class="tdUser">
                                            <p>Numero de Documento</p>
                                            <input type="number" name="" value="<?php echo $dato['numero_documento']; ?>">
                                        </td>
                                        <td class="tdUser">
                                            <p>Fecha Creación</p>
                                            <input type="text" value="<?php echo $dato['fecha_creacion']; ?>" disabled>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="tdUser">
                                            <input type="hidden" name="image" value="<?php echo $dato['imagen']; ?>">
                                            <input type="file" name="image" >
                                        </td>
                                        <td class="tdUser">
                                            <select name="" id=""></select>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 
                    <?php endforeach;?>
                    <div class="tdButton">
                        <button type="submit" class="buttonSave" name="updateUser"><i class="fa fa-plus"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        <?php }else { ?>
            <div class="container">
                <div class="containerFormEdit">
                    <div class="alertWarning">
                        <div class="contentWarning">
                            <i class="fa fa-exclamation-triangle"></i> <?php echo  $error; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
</div> 