<!DOCTYPE html>
<?php extract($_REQUEST) ?>

<div class="container">

<form name="frmAgregarEmpleado" method="post" action="../../Controlador/ctrlEmpleado.php" enctype="multipart/form-data" style="padding: 30px">
    <input type="hidden" name="opcion" id="opcion" value="1">
    <div class="form-group">
        <label >Identificación</label>
        <input type="number" class="form-control" name="txtIdentificacion" id="txtIdentificacion" placeholder="Identificación" required>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label >Nombre</label>
            <input type="text" class="form-control" name="txtNombres" id="txtNombres" placeholder="Nombre" required>
        </div>

        <div class="form-group col-md-6">
            <label >Apellido</label>
            <input type="text" class="form-control" name="txtApellidos" id="txtApellidos" placeholder="Apellido" required>
        </div>
    </div>

    <div class="form-group">
        <label >Correo</label>
        <input type="email" class="form-control" name="txtCorreo" id="txtCorreo" placeholder="Correo" required>
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label >Cargo</label>
            <select class="form-control" name="txtCargo" id="txtCargo" required>
                <option selected>Choose...</option>
                <option value="Gerente">Gerente</option>
                <option value="Tesorero">Tesorero</option>
                <option value="Recepcionista">Recepcionista</option>
            </select>
        </div>

        <div class="form-group col-md-6">
            <label >Rol</label>
            <select class="form-control" name="txtRol" id="txtRol" required>
                <option selected>Choose...</option>
                <option value="Administrador">Administrador</option>
                <option value="Asistente">Asistente</option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label >Foto: (png)</label>
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="foto" id="foto">
            <label class="custom-file-label">Seleccionar Archivo</label>
        </div>
    </div>
<br>
    <div align="center">
        <button type="submit" class="btn btn-dark" name="btnAgregar" id="btnAgregar">Guardar</button>
    </div>  
</form>
</div>
<?php
if (@$x == 1) {
    echo "<script>alert('Empleado agregado correctamente')</script>";
}
if (@$x == 2) {
    echo "<script>alert('la foto no cumple con los requisitos')</script>";
}
if (@$x == 3) {
    echo "<script>alert('Problemas al agregar empleado')</script>";
}
if (@$x == 4) {
    echo "<script>alert('Problemas al enviar correo')</script>";
}
?>