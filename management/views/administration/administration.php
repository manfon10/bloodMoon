<div class="container">
    <div class="containerOption">
        <div class="containerButtonsOptions">
            <div class="buttonsAdministration">
                <button onclick="redirect('../ajax/common_tabs.php', 'view_user')" id="view_user" value="view_user"><i class="fa fa-user"></i> Usuarios</button>
            </div>
            <div class="buttonsAdministration">
                <button onclick="redirect('../ajax/common_tabs.php', 'view_category')" id="view_category" value="view_category"><i class="fa fa-tags"></i> Categorias</button>
            </div>
            <div class="buttonsAdministration">
                <button onclick="redirect('../ajax/common_tabs.php', 'view_roles')" id="view_roles" value="view_roles"><i class="fa fa-user-tag"></i> Roles</button>
            </div>
            <div class="buttonsAdministration">
                <button onclick="redirect('../ajax/common_tabs.php', 'view_sales')" id="view_sales" value="view_sales"><i class="fa fa-shopping-cart"></i> Ventas</button>
            </div>
            <div class="buttonsAdministration">
                <button onclick="redirect('../ajax/common_tabs.php', 'view_orders')" id="view_orders" value="view_orders"><i class="fa fa-shopping-bag"></i> Pedidos</button>
            </div>
        </div>
    </div>
    <div id="gifResultado" class="text-align:center;">
        <?php if(isset($error)){ echo "<p style='color:red;'> $error </p>";} ?>
    </div>
    <div id="divView"></div>
</div>
<script src="../js/app_administration.js"></script> 