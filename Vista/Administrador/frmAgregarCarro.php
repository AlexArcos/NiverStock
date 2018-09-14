<!DOCTYPE html>
<?php extract($_REQUEST) ?>

<div class="container">        

    <form name="frmAgregarCarro" method="post" action="../../Controlador/ctrlCarro.php"enctype="multipart/form-data" style="padding: 20px">
        <input type="hidden" name="opcion" value="1">

        <div class="form-group">
            <label>Placa </label>
            <input type="text" class="form-control" name="txtPlaca" id="txtPlaca" placeholder="Placa" required>
        </div>

        <div class="form-group">
            <label >Marca</label>
            <select class="form-control" name="txtMarca" id="txtMarca" required>
                <option selected>Choose...</option>
                <option value="Audi">Audi</option>
                <option value="Renault">Renault</option>
                <option value="Chevrolet">Chevrolet</option>
                <option value="Mazda">Mazda</option>
                <option value="BMW">BMW</option>
                <option value="Ford">Ford</option>
                <option value="Kia">Kia</option>
                <option value="Mercedes-Benz">Mercedes-Benz</option>
            </select>
        </div>
        <div class="form-group">
            <label >Color</label>
            <input type="text" class="form-control" name="txtColor" id="txtColor" placeholder="Color" required>
        </div>

        <div class="form-group">
            <label >Foto: (png)</label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto" id="foto" required>
                <label class="custom-file-label">Seleccionar Archivo</label>
            </div>
        </div>
        <br>
        <div align="center">
            <button type="submit" class="btn btn-dark " name="btnAgregar" id="btnAgregar">Guardar</button>
        </div>  
    </form>
    <?php
    if (@$x == 1) {
        echo "<script>alert('Carro agregado correctamente')</script>";
    }
    if (@$x == 2) {
        echo "<script>alert('la foto no cumple con los requisitos')</script>";
    }
    if (@$x == 3) {
        echo "<script>alert('Problemas al agregar carro')</script>";
    }
    ?>
