<?php

if($_SESSION['access'] != 1){

    $error = "Por favor inicie sesion :')";
    header('Location: ../index.php?redirec=index&msg=' . $error);
    exit();
}

?>