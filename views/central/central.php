<!-----------------Contenedor--------------------->
<div class="container">
    <div class="panelGraphics">
        <div class="graphicOne">
            <div id="container1"></div>
        </div>
    </div>
    <!------------Apartado de tablas de resumen----------->
    <div class="panelSummary">
        <div class="summary">
            <p>Ultimos Productos Agregados</p>
            <table class="tableProducts">
                <thead class="tableHead">
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Fecha Agregado</th>
                    <th>Item</th>
                </thead>
                <tbody class="tableBody">
                    <?php foreach ($data as $dato) { ?>
                        <tr>
                            <td style="width:10px;"><?php echo $dato['id_producto']; ?></td>
                            <td style="text-align:center;"><?php echo $dato['nombre_producto']; ?></td>
                            <td style="text-align:center;"><?php echo $dato['fecha_agregado']; ?></td>
                            <td style="text-align:center;"><?php echo $dato['item']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>                
        </div>
        <div class="summary">
            <div class="graphicOne">
                <div id="container2"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="../lib/jQuery/jquery-3.5.1.js"></script>
<script type="text/javascript" src="../lib/Highcharts-9.0.0/code/highcharts.js"></script>
<script type="text/javascript" src="../lib/Highcharts-9.0.0/code/highcharts-3d.js"></script>
<script type="text/javascript" src="../lib/Highcharts-9.0.0/code/modules/exporting.js"></script>
<!--Graficos de la central-->
<script type="text/javascript">
    $('#container1').highcharts({
        chart: {
            type: 'column',
            zoomType: 'x'
        },
        colors: ['#1b2f62', '#cc3c1a'],

        title: {
            text: 'Ventas Por Mes'
        },

        xAxis: {
            categories: [
                <?php 
                    foreach ($salesMonth as $series) {
                        echo " ' " . $series['Mes'] . " ' " . ',';
                    } 
                ?>
            ],     
        },

        yAxis: {
            title: {
                text: 'Total de Ventas'
            }
        },
    
        series: [{
            name: 'Ventas',
                data: [
                    <?php 
                        foreach ($salesMonth as $series) {
                            echo $series['TotalVentasMes'] . ',';
                        } 
                    ?>
                ],
        }]
    });
</script>
<!--Grafico de compras pendientes por procesar-->
<script type="text/javascript">
    $('#container2').highcharts({
        chart: {
            type: 'column',
            zoomType: 'x'
        },

        colors: ['#52be80', '#ec7063', '#f1c40f'],

        title: {
            text: 'Estado por Ventas'
        },

        xAxis: {
            categories: [
                <?php 
                    foreach($statusSales as $series){
                        echo " ' " . $series['Estado'] . " ' " . ',';
                    }    
                ?>
            ],     
        },

        yAxis: {
            title: {
                text: 'Total de Ventas'
            }
        },
    
        series: [
            <?php foreach($statusSales as $series) : ?>
                <?php echo " { "; ?> 
                    name: <?php echo " ' " . $series['Estado'] . " ' " .  ','; ?> 
                    data: [
                        <?php echo $series['TotalEstados'] . ','; ?>
                    ],
                <?php echo " }, "; ?>
            <?php endforeach; ?>
        ]
    });
</script>