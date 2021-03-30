<?php

    session_start();

    include_once("../config/security.php");

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" type="text/css" href="../lib/font-awesome/css/all.min.css?v=9.4.4" media="all">
    <script src="../lib/jQuery/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../lib/DataTables/DataTables-1.10.23/css/dataTables.bootstrap4.min.css">
    <title>BLOOD - <?php echo !$_GET['menu'] != '' ? 'Central' : ucwords($_GET['menu']) ; ?></title>
</head>
<body>
    <div class="header_top">
        <div class="logo">
            <a href="index.php"><img src="../img/logo.png" alt=""></a>
        </div>
        <div class="preferences">
            <ul>
                <li><a href="user/logout.php" class="fa fa-sign-out-alt" title="Cerrar Sesion"></a></li>
                <li><a href="index.php?menu=preferences" class="fa fa-cog" title="Preferencias de Usuario"></a></li>
                <li><p><?php echo $_SESSION['user'];  ?></p></li>
            </ul>
        </div>
    </div>
    <div class="header_menu">
        <ul class="menu">
            <li><a href="index.php">Central</a></li>
            <li><a>Inventario</a>
                <ul>
                    <li><a href="index.php?menu=product"><i class="fas fa-tshirt"></i> Productos</a></li>
                    <li><a href="index.php?menu=suppliers"><i class="fas fa-dolly"></i> Proveedores</a></li>
                </ul>
            </li>
            <li><a href="index.php?menu=administration">Administración</a></li>
            <li><a href="index.php?menu=reports">Reportes</a></li>
        </ul>
    </div>