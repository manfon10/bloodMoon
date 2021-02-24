<div class="container">
    <div class="optionsBar">
        <a href="index.php?menu=product"><button class="buttonSave"><i class="fa fa-arrow-left"></i> Volver</button></a>
    </div>
    <div class="containerFormEdit">
        <?php if(isset($data) != "") { ?>
        <form action="index.php?menu=product&action=save&idProduct=<?php echo $data['id_producto']; ?>" method="post" enctype="multipart/form-data" autocomplete="off">
            <div class="borderFormProductAdd">
                <table>
                    <thead>
                        <tr>
                            <th colspan="8"><h3>Edicion Producto - <?php echo $data['nombre_producto']; ?></h3></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <tr>
                                <td colspan="4" class="tdFull">
                                    <?php if($data['imagen'] != "") : ?>
                                        <img src="../uploads/_pictureProducts/<?php echo $data['imagen']; ?>" alt="" style="width:190px;"></td>
                                    <?php endif; ?>
                                </td>
                                <td class="tdFull" rowspan="4">
                                    <p>Imagen</p> 
                                    <input type="hidden" name="image" value="<?php echo $data['imagen']; ?>">
                                    <input type="file" name="image" placeholder="Ingrese una imagen">
                                    <p>Fecha Agregado</p>
                                    <input type="date" name="dateAdd" id="" value="<?php echo $data['fecha_agregado']; ?>">
                                    <p>Nombre Producto</p>
                                    <input type="text" name="nombreProducto" id="" value="<?php echo $data['nombre_producto']; ?>">
                                    <div class="tdTask">
                                        <p>Descripcion</p>
                                        <br>
                                        <textarea name="description" cols="30" rows="15" placeholder="Descripcion"><?php echo $data['descripcion']; ?></textarea>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdMedium">
                                    <p>Talla</p>
                                    <input type="text" name="size" id="" value="<?php echo $data['talla']; ?>">
                                    <td class="tdMedium">
                                        <p>Precio</p>
                                        <input type="number" name="price" id="" value="<?php echo $data['precio']; ?>">
                                    </td>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdFull" colspan="4">
                                    <p>Categoria</p>
                                        <select name="category">
                                            <?php foreach ($data['category'] as $dato) : ?>
                                            <option value="<?php echo $dato['id_categoria']; ?>" <?php if($dato['categoria'] == $dato['id_categoria']) { echo "selected"; } ?> >
                                                    <?php echo $dato['categoria']; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                </td>
                            </tr>
                            <tr>
                                <td class="tdMedium">
                                    <p>Item Producto</p>
                                        <input type="number" name="item" value="<?php echo $data['item']; ?>">
                                </td>
                                <td class="tdMedium">
                                    <p>Stock</p>
                                        <input type="number" name="stock" value="<?php echo $data['stock']; ?>">
                                </td>
                            </tr>
                    </tbody>
                </table>
                <div class="tdButton">
                    <button type="submit" class="buttonSave" name="updateProduct"><i class="fa fa-plus"></i> Guardar</button>
                </div>
            </div>
        </form>
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
</div>
