<div class="formUser">
    <form action="index.php?menu=administration&action=save" method="POST" enctype="multipart/form-data" autocomplete="off">
        <input type="text" name="names" id="" placeholder="Nombres">
        <input type="text" name="surnames" id="" placeholder="Apellidos">
        <select name="typeDocument">
            <?php foreach ($data['type_document'] as $dato) : ?>
                <option value="<?php echo $dato['id_tipo_documento']; ?>"><?php echo $dato['tipo_documento']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="number" name="document" id="" placeholder="Numero de Documento">
        <input type="text" name="username" id="" placeholder="Nombre de Usuario">
        <input type="password" name="password" id="" placeholder="Contraseña">
        <input type="email" name="email" id="" placeholder="Correo Electronico">
        <select name="status">
            <?php foreach ($data['status_user'] as $dato) : ?>
                <option value="<?php echo $dato['id_estado']; ?>"><?php echo $dato['estado']; ?></option>
            <?php endforeach; ?>
        </select>
        <select name="rol">
            <?php foreach ($data['rol'] as $dato) : ?>
                <option value="<?php echo $dato['id_rol']; ?>"><?php echo $dato['nombre_rol']; ?></option>
            <?php endforeach; ?>
        </select>
        <input type="file" name="image" id="">
        <a href="index.php?menu=administration&action=save"><button type="submit" name="addUser" class="buttonSave"><i class="fa fa-plus"></i> Guardar</button></a>
    </form>
</div>