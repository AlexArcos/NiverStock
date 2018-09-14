<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
  <a class="navbar-brand" href="?pg=contenido.php">
    <img src="../../Recursos/Imagenes/rent a car.png" width="300" height="60" alt="">
  </a> 

  <div class="row justify-content-md-left" >

    <ul class="navbar-nav mr-auto justify-content-md-rig">

      <li class="nav-item dropdown" style="margin: 10px">
        <a class="nav-link dropdown-toggle lead" href="#" data-toggle="dropdown">Alquiler</a>        
        <div class="dropdown-menu">
          <a class="dropdown-item" href="?pg=frmAgregarAlquiler.php">Agregar</a>
          <a class="dropdown-item" href="?pg=frmDevolucionAlquiler.php">Devolución</a>
          <a class="dropdown-item" href="?pg=graficaGoogleChart.php">Consultas</a>
        </div>
      </li>

      <li class="nav-item dropdown" style="margin: 10px">
        <a class="nav-link dropdown-toggle lead" href="#" data-toggle="dropdown">Empleados</a>       
        <div class="dropdown-menu">
          <a class="dropdown-item" href="?pg=frmAgregarEmpleado.php">Agregar</a>
          <a class="dropdown-item" href="#">Actualizar</a>
          <a class="dropdown-item" href="?pg=frmListarEmpleados.php" >Listar</a>
        </div>
      </li>

      <li class="nav-item dropdown" style="margin: 10px">
        <a class="nav-link dropdown-toggle lead" href="#" data-toggle="dropdown">Clientes</a>        
        <div class="dropdown-menu">
          <a class="dropdown-item" href="?pg=frmAgregarCliente.php">Agregar</a>
          <a class="dropdown-item" href="#">Actualizar</a>
          <a class="dropdown-item" href="?pg=frmListarClientes.php" onclick="listarClientes()">Listar</a>
        </div>
      </li>

      <li class="nav-item dropdown" style="margin: 10px">
        <a class="nav-link dropdown-toggle lead" href="#" data-toggle="dropdown">Carros</a>        
        <div class="dropdown-menu">
          <a class="dropdown-item" href="?pg=frmAgregarCarro.php">Agregar</a>
          <a class="dropdown-item" href="#">Actualizar</a>
          <a class="dropdown-item" href="?pg=frmListarCarros.php">Listar</a>
        </div>
      </li>

      <li class="nav-item active" style="padding: 10px; margin-left: 340PX;">
        <a class="nav-link lead " href="../salir.php">Cerrar sesion</a>
      </li>

<style>
  .foto{
    width: 50px;
    height: 50px;
    border-radius: 50%;
    float: right;
    margin-top: 10px;
    padding: 0;
  }  

</style>  

    <img src="../Fotos/<?php echo $_SESSION['identifica']?>.png" class="foto">

    </ul>
    
  </div>
</nav>     
