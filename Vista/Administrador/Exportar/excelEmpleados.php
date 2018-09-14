<?php
include '../../../Modelo/Conexion.php';
include "../../../Modelo/DatosEmpleado.php";

$objDatosEmpleado = new DatosEmpleado();
$resultado = $objDatosEmpleado->listarEmpleados();
$cantidad = $resultado->datos->rowCount();
header('Content-type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename=excelEmpleados.xls');
header('Pragma: no-cache');
header('Expires: 0');
?>

<h2 align="center"> LISTADO DE EMPLEADOS </h2>

<table width="70%" border="1" align="center">
	<tr>
		<td align="center"><?php echo utf8_decode("Identificación")?></td>
		<td align="center">Nombres</td>
		<td align="center">Apellidos</td>
		<td align="center">Correo</td>
		<td align="center">Cargo</td>
	</tr> 
    <?php
    while ($unEmpleado = $resultado->datos->fetchObject()) {
	?>
    <tr>
        <td><?php echo $unEmpleado->perIdentificacion ?></td>
        <td><?php echo $unEmpleado->perNombres ?></td>
        <td><?php echo $unEmpleado->perApellidos ?></td>
        <td><?php echo $unEmpleado->perCorreo ?></td>
        <td><?php echo $unEmpleado->empCargo ?></td>
    </tr>
    <?php } ?>
</table>

