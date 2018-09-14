
<div class="container" style="padding: 30px">

  <div class="form-row">
    
    <div class="form-group col-md-6">
      <label >Consultar cantidad de carros alquilados por: </label>
      <select class="form-control" name="opcion" id="opcion" onchange="generarGraficoBD()">
        <option value="1">Mes</option>
        <option value="2">Placa</option>
        <option value="3">Cliente</option>
      </select>
    </div>

    <div class="form-group col-md-6">
      <label >Tipo de grafico</label>
      <select class="form-control" id="tipoGrafico" onchange="generarGraficoBD()">
        <option value="1">Columna</option>
        <option value="2">Circular</option>
      </select>
    </div>

  </div>

  <center>
    <div id="grafico" style="width: 60%; height: 500px; padding-top:20px "></div>
  </center>

</div>
