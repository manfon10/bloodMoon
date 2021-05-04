<div class="containerFormsAdministration">
    <div class="containerSearch">
        <div class="searchBar">
            <div class="buttonsSearch">
                <p>Filtrar por: </p>
                <button id="searchDate" onclick="showDate('resultDate')">
                    <div class="divImg">
                        <i class="fa fa-calendar-plus"></i>
                    </div> 
                    Fecha
                </button>
                <button id="searchItem" onclick="showDate('resultItem')">
                    <div class="divImg">
                        <i class="fa fa-external-link-square-alt"></i>
                    </div>
                    Item
                </button>
                <button id="searchPatron" onclick="showDate('resultPatron')">
                    <div class="divImg">
                        <i class="fa fa-network-wired"></i>
                    </div>
                    Patron
                </button>
            </div>
            <div class="resultSearchForm">
                <div id="resultDate" style="display: none;">
                    <form action="index.php?menu=product&action=search" method="POST">
                        <div clas="optionSearch">
                            <label for="">Fecha Uno</label>
                            <input type="date" name="searchDateOne" class="optionSearch">
                            <label for="">Fecha Dos</label>
                            <input type="date" name="searchDateTwo" class="optionSearch">
                                <div class="buttonsSearch">
                                    <button style="background-color: #fec95c; color: #8f5a0a;" type="submit" name="searchDate">
                                        <div class="divImg">
                                            <i class="fa fa-search"></i>
                                        </div>
                                        Buscar
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
                <div id="resultItem" style="display: none;">
                    <form action="index.php?menu=product&action=search" method="POST" autocomplete="off">
                        <div clas="optionSearch">
                            <label for="">Numero de Item</label>
                            <input type="number" name="itemProduct" class="optionSearch">
                                <div class="buttonsSearch">
                                    <button style="background-color: #fec95c; color: #8f5a0a;" type="submit" name="searchItem">
                                        <div class="divImg">
                                            <i class="fa fa-search"></i>
                                        </div>
                                        Buscar
                                    </button>
                                </div>
                        </div>
                    </form>
                </div>
                <div id="resultPatron" style="display: none;">
                    <form action="index.php?menu=product&action=search" method="POST" autocomplete="off">
                        <div clas="optionSearch">
                            <label for="">Patron: </label>
                            <select name="patron" class="optionSearch" required>
                                <option started>-----------</option>
                                <option value="nombre_producto">Nombre</option>
                                <option value="precio">Precio</option>
                                <option value="stock">Stock</option>
                            </select>
                            <label for="">Patron a Buscar: </label>
                            <input type="text" name="valorPatron" class="optionSearch" required>
                            <div class="buttonsSearch">
                                <button style="background-color: #fec95c; color: #8f5a0a;" type="submit" name="searchPatron">
                                    <div class="divImg">
                                        <i class="fa fa-search"></i>
                                    </div>
                                    Buscar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
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