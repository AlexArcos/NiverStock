<!DOCTYPE html>
<?php extract($_REQUEST) ?>

<div class="container">        

    <form name="frmAgregarCliente" method="post" action="../../Controlador/ctrlCliente.php" style="padding: 20px">
        <input type="hidden" name="opcion" value="1">

        <div class="form-group">
            <label >Identificación</label>
            <input type="number" class="form-control" name="txtIdentificacion" id="txtIdentificacion" placeholder="Identificación">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label >Nombre</label>
                <input type="text" class="form-control"name="txtNombres" id="txtNombres" placeholder="Nombre">
            </div>

            <div class="form-group col-md-6">
                <label >Apellido</label>
                <input type="text" class="form-control" name="txtApellidos" id="txtApellidos" placeholder="Apellido">
            </div>
        </div>

        <div class="form-group">
            <label >Correo</label>
            <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Correo">
        </div>

        <div class="form-group">
            <label>Telefono </label>
            <input type="tel" class="form-control" name="txtTelefono" id="txtTelefono" placeholder="Telefono">	
        </div>
<br>
        <div align="center">
            <button type="submit" class="btn btn-dark" name="btnAgregar" id="btnAgregar">Guardar</button>
        </div> 
    </form>
</div>

<?php
if (@$x == 1) {
    echo "<script>alert('Cliente agregado correctamente')</script>";
}
if (@$x == 2) {
    echo "<script>alert('Problemas al agregar cliente')</script>";
}
?>
    

