<?php
if (!isset($_SESSION['idEmpleado'])) {
    header('location:../frmInicioSesion.php?x=2');
}
?>
<div align="center">
    <p><h2>ASISTENTE</h2></p>
</div>
<div>
    <p>Funciones: </p>
    <p>Agregar empleados al sistema </p>
    <p>Actualizar empleados </p>
    <p>Listar empleados registrados </p>
</div>
    


