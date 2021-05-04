<div class="containerFormsAdministration">
    <table class="tableProducts" style="width:98%;">
        <thead class="tableHead">
            <tr>
                <th>Nombre Rol</th>
                <th>Permisos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="tableBody">
            <?php if($data != []) :?>
                <?php foreach($data as $dato) :?>
                    <tr>
                        <td><?php echo $dato['nombre_rol']; ?></td>
                        <td><?php echo $dato['Permisos']; ?></td>
                        <td>
                            <a href="" ><i class="fa fa-edit"></i></a>
                            <a href="" ><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>