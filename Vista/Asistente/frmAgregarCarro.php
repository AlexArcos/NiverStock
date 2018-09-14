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
        <h2 style="text-align: center;">AGREGAR CARRO</h2>

        <form name="frmAgregarCarro" method="post" action="../../Controlador/ctrlCarro.php" >
            <input type="hidden" name="opcion" value="1">

            <div class="input-group">
                <label>Placa: </label>
                <input type="text" name="txtPlaca" id="txtPlaca" required>
            </div>

            <label>Marca: </label>
            <div class="select">	
                <select name="txtMarca" id="txtMarca">
                    <option value="Marca1">Audi</option>
                    <option value="Marca2">Renault</option>
                    <option value="Marca3">Chevrolet</option>
                    <option value="Marca4">Mazda</option>
                    <option value="Marca5">BMW</option>
                    <option value="Marca6">Ford</option>
                    <option value="Marca7">Kia</option>
                    <option value="Marca8">Mercedes-Benz</option>
                </select>
            </div>

            <div class="input-group">
                <label>Color: </label>
                <input type="text" name="txtColor" id="txtColor">	
            </div>
            
            <div class="input-group" align="center"><br>
                <button class="btn" type="submit" name="save" >Save</button>
            </div>
        </form>
        <p align="center" class="msg">
            <?php
            if (@$x == 1) {
                echo "Carro agregado correctamente";
            }
            if (@$x == 2) {
                echo "Carro al agregar empleado";
            }
            ?>
        </p>
    </body>
</html>