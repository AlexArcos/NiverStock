                
<body class="cuerpo">

    <!-- MAIN (Center website) -->
    <div class="principal">

        <!-- Portfolio Gallery Grid -->
        <div class="fila"></div>

        <!-- Modal -->
        <div class="modal fade" id="modalAlquiler" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar alquiler</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Agregar Alquiler -->
                        <form name="frmAgregarAlquiler" method="post" action="../../Controlador/ctrlAlquiler.php">
                            <input type="hidden" name="opcion" value="1">
                            <input type="hidden" id="txtIdCliente" name="txtIdCliente">
                            <input type="hidden" id="txtIdCarro" name="txtIdCarro">

                            <div class="form-group">
                                <label>Identificación del cliente: </label>
                                <input type="text" class="form-control" name="txtIdentificacionAlquiler" id="txtIdentificacionAlquiler" required>
                            </div>

                            <div class="form-row" id="datosCliente"></div>

                            <div class="form-group">
                                <label>Fecha devolución estimada:</label>
                                <input type="text" class="form-control" name="txtFechaDevolucion" id="txtFechaDevolucion">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                    </form>
                </div>
            </div>
        </div>
        <!-- END MAIN -->
    </div>
</body>

<?php
if (@$x == 1) {
    echo "<script>alert('Alquiler agregado correctamente')</script>";
}
if (@$x == 2) {
    echo "<script>alert('Problemas al agregar alquiler')</script>";
}
?>
