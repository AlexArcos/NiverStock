<?php
session_start();
extract($_REQUEST);
error_reporting(0);
if (!isset($_GET['pg'])) {
    $pg = "contenido.php";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Estilos -->
        <link rel="stylesheet" type="text/css" href="../CSS/style.css">
        <link rel="stylesheet" type="text/css" href="../CSS/bootstrap.css">
        <link href="../../Recursos/Librerias/Jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <!-- Funciones -->
        <script src="../../Recursos/Librerias/Jquery/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/Jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="../JS/funciones.js" type="text/javascript"></script>
        <script src="../JS/alquiler.js" type="text/javascript"></script>
        <script src="../JS/bootstrap.js" type="text/javascript"></script>  
        <!-- llamado de la api de google -->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript" src="../JS/graficas.js"></script>


        <title></title>
    </head>
    <body>
        <header><?php include 'menu.php' ?></header>
        <section><?php include $pg ?></section>
        <footer class="bg-dark"><?php include 'piePagina.php' ?></footer>
    </body>
</html>
