<div class="container">
    <div class="optionsBar">
        <a href="index.php?menu=administration"><button class="buttonSave"><i class="fa fa-arrow-left"></i> Volver</button></a>
    </div>
    <?php if(isset($data) != "") { ?>
        <div class="containerFormEditUser">
            <div>
                <form action="">
                    <?php foreach($data as $dato) : ?>
                        <table>
                            <thead>
                                <tr>
                                    <th colspan="8"><h3>Edición Usuario - <?php echo $dato['nombre_usuario']; ?></h3></th>
                                </tr>  
                            </thead>
                            <tbody>
                                <tr>

                                    <td colspan="1">
                                        <?php if($dato['imagen'] != "") { ?>
                                            <img src="../uploads/_pictureUsers/<?php echo $dato['imagen']; ?>" alt="" style="width:100px;"></td>
                                        <?php } else { ?>
                                            <img src="../img/img_user_default.png" alt="" style="width:190px;"></td>
                                        <?php } ?>
                                    </td>
                                    <td colspan="1">
                                        <p>Rol: <?php echo $dato['nombre_rol']; ?></p>
                                        <p style="">Estado Usuario:
                                        <?php if($dato['estado'] == "Activo") { ?>
                                            <?php echo $dato['estado'] . " " ; ?><img src="../img/activo.png" style="width:15px;">
                                                <?php } else { ?>
                                                <?php echo $dato['estado']; ?> <img src="../img/inactivo.png" style="width:15px;">
                                            <?php } ?></p>
                                        <p>Ultimo acceso al sistema: <?php if($dato['ultimo_acceso'] != ""){ echo $dato['ultimo_acceso'];} else {echo "No Tiene Registro";} ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdMedium">
                                        <input type="text" name="names" value="<?php echo $dato['nombres']; ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="surnames" value="<?php echo $dato['apellidos']; ?>">
                                    </td>
                                    <td class="tdFull">
                                        <input type="mail" name="email" value="<?php echo $dato['email']; ?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <select name="category">
                                            <option value="<?php echo $dato['tipo_documento']; ?>" <?php if($dato['tipo_documento'] == $dato['tipo_documento']) { echo "selected"; } ?> >
                                                <?php echo $dato['tipo_documento']; ?>
                                            </option>
                                        </select>
                                    </td>
                                    <td>
                                        <input type="number" name="" value="<?php echo $dato['numero_documento']; ?>">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <?php endforeach;?>
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