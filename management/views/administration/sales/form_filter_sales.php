<div id="divResulSalesFilter" style="display: flex; justify-content: center;">
    <?php if(isset($error)) { ?>
        <div class="containerFormEdit" style="width:50%; padding:10px; display: flex; justify-content: center;">
            <div class="alertWarning">
                <div class="contentWarning">
                    <i class="fa fa-exclamation-triangle"></i> <?php if(isset($error)){
                        echo $error;
                    } ?>
                </div>
            </div>
        </div>
    <?php }else {  ?>
        <table class="tableProducts" style="width:98%;">
            <thead class="tableHead">
                <tr>
                    <th>Codigo</th>
                    <th>Estado Compra</th>
                    <th>Nombres Cliente</th>
                    <th>Fecha Compra</th>
                    <th>Item Producto</th>
                    <th>Nombre Producto</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Precio Total</th>
                </tr>
            </thead>
            <tbody class="tableBody">
                <?php if($data != []) :?>
                    <?php foreach($data as $dato) :?>
                        <tr>
                            <td><?php echo $dato['id_detalle_ventas']; ?></td>
                                <?php if($dato['estado'] == 'Aprovado') { ?>
                                    <td><p style="background:#52be80; color:black; width:60%;"><?php echo $dato['estado']; ?></p></td>
                                <?php }else if($dato['estado'] == 'Pendiente') { ?>
                                    <td><p style="background:#f1c40f; color:black; width:60%;"><?php echo $dato['estado']; ?></p></td>
                                <?php }else if($dato['estado'] == 'Denegada') { ?>
                                    <td><p style="background:#ec7063; color:black; width:60%;"><?php echo $dato['estado']; ?></p></td>
                                <?php } ?>
                            <td><?php echo $dato['Nombre_Cliente']; ?></td>
                            <td><?php echo $dato['fecha_compra']; ?></td>
                            <td><?php echo $dato['item']; ?></td>
                            <td><?php echo $dato['nombre_producto']; ?></td>
                            <td><?php echo $dato['cantidad']; ?></td>
                            <td><?php echo $dato['precio']; ?></td>
                            <td><?php echo $dato['Total']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    <?php }  ?>
</div>