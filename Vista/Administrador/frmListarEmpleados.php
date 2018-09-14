<?php
include '../../Modelo/Conexion.php';
include '../../Modelo/DatosEmpleado.php';
$objDatosEmpleado = new DatosEmpleado();
$resultado = $objDatosEmpleado->listarEmpleados();
$cantidad = $resultado->datos->rowCount();
?>

<div align="center" style="margin: 20px;">

    <table>
        <thead>
            <tr>
                <th>Identificación</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Cargo</th>
                <th>Foto</th>
            </tr>
        </thead>
        <?php
        while ($unEmpleado = $resultado->datos->fetchObject()) {
            if (file_exists("../Fotos/" . $unEmpleado->perIdentificacion . '.png')) {
                $foto = "../Fotos/" . $unEmpleado->perIdentificacion . '.png';
                $id = $unEmpleado->perIdentificacion;
            } else {
                $foto = "../Fotos/silueta.png";
            }
            ?>
            <tr>
                <td><?php echo $unEmpleado->perIdentificacion ?></td>
                <td><?php echo $unEmpleado->perNombres ?></td>
                <td><?php echo $unEmpleado->perApellidos ?></td>
                <td><?php echo $unEmpleado->perCorreo ?></td>
                <td><?php echo $unEmpleado->empCargo ?></td>
                <td width="70"><img class="foto" id="<?php echo $id ?>" src="<?php echo $foto ?>" width="40" height="40"></td>
            </tr>

            <!-- The Modal -->
            <div id="myModal" class="modal">
                <span class="close">&times;</span>
                <img class="modal-content" id="img01">
                <div id="caption"></div>
            </div>
        <?php } ?>
    </table>

    <p style="margin: 20px">
        <a href="Exportar/pdfEmpleados.php" style="margin: 20px"><img src="../../Recursos/Imagenes/pdfLogo.png" title="Exportar a pdf" width="50" height="50"></a>
        <a href="Exportar/excelEmpleados.php" style="margin: 20px"><img src="../../Recursos/Imagenes/excelLogo.png" title="Exportar a Excel" width="57" height="57"></a>        
    </p>

</div>