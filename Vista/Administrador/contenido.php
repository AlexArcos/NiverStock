<?php
if (!isset($_SESSION['idEmpleado'])) {
    header('location:../?pg=frmInicioSesion.php&x=2');
}
?>

<div id="myCarousel" class="carousel slide" data-ride="carousel">

      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>

      <div class="carousel-inner">

        <div class="carousel-item active">
          <img class="d-block w-100" src="../../Recursos/Imagenes/1.jpg" alt="First slide" style="width:100%; height: 700px ">
          <div class="carousel-caption d-none d-md-block">
            <h5>Servicio</h5>
            <p>...</p>
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="../../Recursos/Imagenes/2.jpg" alt="Second slide" style="width:100%; height: 700px">
        </div>

        <div class="carousel-item">
          <img class="d-block w-100" src="../../Recursos/Imagenes/3.jpg" alt="Third slide" style="width:100%; height: 700px">
        </div>

      </div>

      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>

      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>

    </div>



