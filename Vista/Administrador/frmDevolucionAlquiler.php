
<?php extract($_REQUEST) ?>

<div class="container" style="padding: 20px">

    <div align="center">
    
        <table id="tablaCarros">
            <thead>
                <tr>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Identificación</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>FechaAlquiler</th>
                    <th>Devolución</th>
                </tr>
            </thead> 
    
            <tbody>
                <tr id="fila">
                    <td id="placaAlq"></td>
                    <td id="marcaAlq"></td>
                    <td id="identificacionCliente"></td>
                    <td id="nombreCliente"></td>
                    <td id="apellidoCliente"></td>
                    <td id="fechaAlquiler"></td>
                    <td id="devolucion"></td>
                </tr>
            </tbody>
        </table>
    </div>

        <!-- Modal -->
    <div class="modal fade" id="modalAlquiler" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Devolución alquiler</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form name="devolucionAlquiler" method="post" action="../../Controlador/ctrlAlquiler.php">
                        <input type="hidden" name="opcion" value="2">
                        <input type="hidden" name="idAlquilerModal" id="idAlquilerModal">
                        <input type="hidden" name="idCarroModal" id="idCarroModal">                       
                        ¿Seguro de registrar devolucion de alquiler?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width: 20%">No</button>
                    <button type="submit" id="btnDevolucion" class="btn btn-primary" style="width: 20%">Si</button>
                </div>

                    </form>
            </div>
        </div>
    </div>

</div>

<?php
if (@$x == 1) {
    echo "<script>alert('Devolución de alquiler exitosa')</script>";
}
if (@$x == 2) {
    echo "<script>alert('Problemas al devolver alquiler')</script>";
}
?>