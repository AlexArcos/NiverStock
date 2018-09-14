<!DOCTYPE html>
<?php extract($_REQUEST) ?>
<html lang="en">
    <head>
        <meta charset="UTF-8"> 
        <title>CRUD ALQUILER</title>
    </head>

    <body>        
        <form name="frmAgregarEmpleado" method="post" action="../../Controlador/ctrlEmpleado.php" >
            <input type="hidden" name="opcion" value="1">

            <div class="input-group">
                <label>Identificación: </label>
                <input type="text" name="txtIdentificacion" id="txtIdentificacion" required>
                <div id="msj"></div>
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

            <label>Cargo: </label>
            <div class="select">	
                <select name="txtCargo" id="txtCargo">
                    <option value="Gerente">Gerente</option>
                    <option value="Tesoreso">Tesoreso</option>
                    <option value="Recepcionista">Recepcionista</option>
                </select>
            </div><br>

            <label>Rol: </label>
            <div class="select">	
                <select name="txtRol" id="txtRol">
                    <option value="Administrador">Administrador</option>
                    <option value="Asistente">Asistente</option>
                </select>
            </div>

            <div class="input-group" align="center"><br>
                <button class="btno" type="submit" name="btnAgregar" id="btnAgregar">Agregar</button>
            </div>
        </form>
        <p align="center" class="msg">
            <?php
            if (@$x == 1) {
                echo "Empleado agregado correctamente";
            }
            if (@$x == 2) {
                echo "Problemas al agregar empleado";
            }
            ?>
        </p>
    </body>
</html>