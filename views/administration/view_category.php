<div class="containerFormsAdministration">
    <div class="containerCategory">
        <div class="subContainerCategory">
            <h4><i class="fas fa-caret-right"></i> Agregar Categoria</h4>
                <form action="" method="POST">
                    <p>Nombre Categoria</p>
                    <div class="categoryInfo">
                        <input type="text" name="category" placeholder="Nombre de la Categoria">
                            <div class="buttonCategory">
                                <a href="index.php?menu=administration&action=saveCategory"><button class="buttonSave"><i class="fa fa-plus"></i> Guardar</button></a>
                            </div>
                    </div>
                </form>
        </div>
    </div>
    <div class="containerCategory">
        <div class="subContainerCategory">
            <h4><i class="fas fa-caret-right"></i> Categorias</h4>
                <table class="tableProducts">
                    <thead class="tableHead">
                        <th>Id Categoria</th>
                        <th>Nombre Categoria</th>
                        <th>Accion</th>
                    </thead>
                    <tbody class="tableBody">
                        <?php if($data != []) :?>
                            <?php foreach($data as $dato) : ?>
                                <tr>
                                    <td><?php echo $dato['id_categoria']; ?></td>
                                    <td><?php echo $dato['categoria']; ?></td>
                                    <td>
                                        <a href="index.php?menu=administration?action=deleteCategory&idCategory=<?php echo $dato['id_categoria'];?>" style="color:red;"><i class="fa fa-trash-alt"></i></a>
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
                        <?php endif;?>
        </div>
    </div>
</div>