<?php
include '../../../Modelo/Conexion.php';
include "../../../Modelo/DatosCarro.php";

$objDatosCarro = new DatosCarro();
$resultado = $objDatosCarro->listarCarros();
$cantidad = $resultado->datos->rowCount();
header('Content-type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment;filename=excelCarros.xls');
header('Pragma: no-cache');
header('Expires: 0');
?>

<h2 align="center"> LISTADO DE CARROS </h2>

<table width="70%" border="1" align="center">
	<tr>
		<td align="center">Placa</td>
		<td align="center">Marca</td>
		<td align="center">Color</td>
		<td align="center">Estado</td>
	</tr> 
    <?php
    while ($carro = $resultado->datos->fetchObject()) {
	?>
    <tr>
        <td><?php echo $carro->carPlaca ?></td>
        <td><?php echo $carro->carMarca ?></td>
        <td><?php echo $carro->carColor ?></td>
        <td><?php echo $carro->carEstado ?></td>
    </tr>
    <?php } ?>
</table>

