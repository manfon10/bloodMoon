<div class="container">
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
    <div class="containerProduct">
        <div class="containerFormProduct">
            <a href="index.php?menu=product&action=create"><button class="buttonSave"><i class="fa fa-plus"></i> Agregar</button></a>
            <form action="index.php?menu=product&action=edit" method="POST">
                <div class="buttonsAction">
                    <button name="editProduct" class="buttonEdit" style="float:left;"><i class="fa fa-edit"></i> Editar</button>
                </div>
                <div class="containerTableProducts">
                    <table class="tableProducts">
                        <thead class="tableHead">
                            <tr>
                                <th></th>
                                <th>Nombre</th>
                                <th>Imagen</th>
                                <th>Talla</th>
                                <th>Precio</th>
                                <th>Stock</th>
                                <th>Fecha Agregado</th>
                                <th>Item</th>
                                <th>Accion</th>
                            </tr>
                        </thead>
                        <tbody class="tableBody">
                            <?php if($data != []) : ?>
                                <?php foreach ($data as $dato) : ?>
                                    <tr>
                                        <td style="width:10px;"><input type="checkbox" name="idProduct" value="<?php echo $dato['id_producto']; ?>"></td>
                                        <td><?php echo $dato['nombre_producto']; ?></td>
                                        <td><img src="../uploads/_pictureProducts/<?php echo $dato['imagen']; ?>" style="width:50px; height:50px;"></td>
                                        <td><?php echo $dato['talla']; ?></td>
                                        <td>$<?php echo $dato['precio']; ?></td>
                                        <td><?php echo $dato['stock']; ?></td>
                                        <td><?php echo $dato['fecha_agregado']; ?></td>
                                        <td><?php echo $dato['item']; ?></td>
                                        <td style="width:15%;">
                                            <a href="index.php?menu=product&action=delete&idProduct=<?php echo $dato['id_producto'];?>" ><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
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
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="../js/app_product.js"></script> 