<!DOCTYPE html>
<?php extract($_REQUEST) ?>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <link rel="stylesheet" type="text/css" href="../../CSS/style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CRUD ALQUILER</title>
    </head>

    <body>        
        <h2 style="text-align: center;">AGREGAR CLIENTE</h2>

        <form name="frmAgregarCliente" method="post" action="../../Controlador/ctrlCliente.php" >
            <input type="hidden" name="opcion" value="1">

            <div class="input-group">
                <label>Identificación: </label>
                <input type="text" name="txtIdentificacion" id="txtIdentificacion" required>
            </div>

            <div class="input-group">
                <label>Nombre: </label>
                <input type="text" name="txtNombres" id="txtNombres">
            </div>

            <div class="input-group">
                <label>Apellido: </label>
                <input type="text" name="txtApellidos" id="txtApellidos">	
            </div>

            <div class="input-group">
                <label>Correo: </label>
                <input type="email" name="txtCorreo" id="txtCorreo">
            </div>

            <div class="input-group">
                <label>Telefono: </label>
                <input type="tel" name="txtTelefono" id="txtTelefono">	
            </div>

            <div class="input-group" align="center"><br>
                <button class="btn" type="submit" name="save" >Save</button>
            </div>
        </form>
        <p align="center" class="msg">
            <?php
            if (@$x == 1) {
                echo "Cliente agregado correctamente";
            }
            if (@$x == 2) {
                echo "Cliente al agregar empleado";
            }
            ?>
        </p>
    </body>
</html>