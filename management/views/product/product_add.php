<div class="container">
    <div class="optionsBar">
        <a href="index.php?menu=product"><button class="buttonSave"><i class="fa fa-arrow-left"></i> Volver</button></a>
    </div>
        <div class="containerProductAdd">
            <form action="index.php?menu=product&action=save" method="post" enctype="multipart/form-data" autocomplete="off">
                <div class="borderFormProductAdd">
                    <table>
                        <thead>
                            <tr>
                                <th colspan="8"><h3>Nuevo Elemento - Producto</h3></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <tr>
                                    <td colspan="4" class="tdFull">
                                        <p>Fecha Agregado</p>
                                        <input type="date" name="dateAdd" id="dateAdd">
                                    </td>
                                    <td rowspan="1" class="tdFull">
                                        <p>Imagen</p>
                                        <input type="file" name="image" id="image">
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="tdFull">
                                        <p>Nombre Producto</p>
                                        <input type="text" name="nombreProducto" id="">
                                        <td rowspan="4" class="tdTask">
                                            <textarea name="description" id="" cols="30" rows="10" placeholder="Descripcion"></textarea>
                                        </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdMedium">
                                        <p>Talla</p>
                                        <input type="text" name="size" id="">
                                        <td class="tdMedium">
                                            <p>Precio</p>
                                            <input type="number" name="price" id="">
                                        </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tdMedium">
                                        <p>Categoria</p>
                                        <select name="category">
                                            <option started>--------</option>
                                            <?php foreach ($data['category'] as $dato) : ?>
                                                <option value="<?php echo $dato['id_categoria']; ?>"><?php echo $dato['categoria']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                            <td class="tdMedium">
                                                <p>Stock</p>
                                                <input type="number" name="stock" id="">
                                            </td>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="tdFull">
                                        <p>Item Producto</p>
                                        <input type="number" name="item">
                                    </td>
                                </tr>   
                        </tbody>
                    </table>
                    <div class="tdButton">
                        <a href="index.php?menu=product&action=save"><button type="submit" name="addProduct" class="buttonSave"><i class="fa fa-plus"></i> Guardar</button></a>
                    </div>
                </div>
            </form>
            <?php if(isset($error) != ''){ ?>
                <div class="containerFormEdit">
                    <div class="alertWarning">
                        <div class="contentWarning">
                            <i class="fa fa-exclamation-triangle"></i> 
                                <?php echo $error; ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>