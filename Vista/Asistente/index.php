<?php 
session_start();
extract($_REQUEST);
error_reporting(0);
if(!isset($_GET['pg'])){
    $pg="contenido";
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../../CSS/dropdown.css">
        <link rel="stylesheet" type="text/css" href="../../CSS/style.css">
        <link href="../../Recursos/Librerias/Jquery/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="../../Recursos/Librerias/Jquery/external/jquery/jquery.js" type="text/javascript"></script>
        <script src="../../Recursos/Librerias/Jquery/jquery-ui.js" type="text/javascript"></script>
        <script src="../../JS/funciones.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        <header><?php include 'encabezado.php'?></header>
        <nav><?php include 'menu.php'?></nav>
            <section><?php include $pg.'.php'?></section>
        <footer><?php include 'piePagina.php'?></footer>
    </body>
</html>
