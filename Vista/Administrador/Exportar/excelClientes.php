<?php
include '../../../Modelo/Conexion.php';
include "../../../Modelo/DatosCliente.php";

$objDatosCliente = new DatosCliente();
$resultado = $objDatosCliente->listarClientes();
$cantidad = $resultado->datos->rowCount();
header('Content-type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename=excelCarros.xls');
header('Pragma: no-cache');
header('Expires: 0');
?>

<h2 align="center"> LISTADO DE CLIENTES </h2>

<table width="70%" border="1" align="center">
	<tr>
        <td align="center"><?php echo utf8_decode("Identificación")?></td>
        <td align="center">Nombres</td>
        <td align="center">Apellidos</td>
        <td align="center">Correo</td>
        <td align="center">Telefono</td>
    </tr> 
    <?php
    while ($unCliente = $resultado->datos->fetchObject()) {
    ?>
    <tr>
        <td><?php echo $unCliente->perIdentificacion ?></td>
        <td><?php echo $unCliente->perNombres ?></td>
        <td><?php echo $unCliente->perApellidos ?></td>
        <td><?php echo $unCliente->perCorreo ?></td>
        <td><?php echo $unCliente->cliTelefono ?></td>
    </tr>
    <?php } ?>
</table>

