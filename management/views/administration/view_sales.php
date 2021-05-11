<div class="containerFormsAdministration">
    <div class="containerSearchSales">
        <div class="searchBarSales">
            <div class="filterSales">
                <label>Opciones de Filtrado: </label>
                <select name="option" onChange="optionSelect(this.value)">
                    <option started>--------</option>
                    <option value="codigo">Codigo</option>
                    <option value="estado">Estado</option>
                    <option value="itemm">Item</option>
                    <option value="cliente">Cliente</option>
                    <option value="fecha">Fecha</option>
                </select>
            </div>
            <div id="codigo" style="display:none;">
                <form class="filterSales" id="code" action="javascript:getFilterSales('code', 'buttonCode')">
                    <input type="text" name="code" placeholder="Numero de Codigo">
                    <button class="buttonSave" id="buttonCode">Filtrar</button>
                </form>
            </div>
            <div id="estado" style="display:none;">
                <form class="filterSales" id="status" action="javascript:getFilterSales('status', 'buttonStatus')">
                    <select name="id_estus">
                        <option started>--------</option>
                        <?php foreach($state as $dato) : ?>
                            <option value="<?php echo $dato['id_estado_compra']; ?>"> <?php echo $dato['estado']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="buttonSave" id="buttonStatus">Filtrar</button>
                </form>
            </div>
            <div id="itemm" style="display:none;">
                <form class="filterSales" id="item" action="javascript:getFilterSales('item', 'buttonItem')">
                    <input type="text" name="item" placeholder="Numero de Item">
                    <button class="buttonSave" id="buttonItem">Filtrar</button>
                </form>
            </div>
            <div id="cliente" style="display:none;">
                <form class="filterSales" id="client" action="javascript:getFilterSales('client', 'buttonClient')">
                    <input type="text" name="client" placeholder="Nombre del Cliente">
                    <button class="buttonSave" id="buttonClient">Filtrar</button>
                </form>
            </div>
            <div id="fecha" style="display:none;">
                <form class="filterSales" id="dates" action="javascript:getFilterSales('dates', 'buttonDates')">
                    <input type="date" name="dateOne">
                    <label> a </label>
                    <input type="date" name="dateTwo">
                    <button class="buttonSave" id="buttonDates">Filtrar</button>
                </form>
            </div>
            <div id="gitResultSales"></div>
        </div>
    </div>
    <div class="containerTableSales">
        <div id="divResulSalesFilter">
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
        </div>
    </div>
</div>