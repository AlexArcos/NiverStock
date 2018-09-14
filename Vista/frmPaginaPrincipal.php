<?php   
extract($_REQUEST);
if (!isset($_GET['pg'])) {
    $pg = "carouselPrincipal.php";
} ?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="CSS/style.css">
    <link rel="stylesheet" type="text/css" href="CSS/login.css">
    <link rel="stylesheet" type="text/css" href="CSS/bootstrap.css">

    <script src="../Recursos/Librerias/Jquery/external/jquery/jquery.js" type="text/javascript"></script>
    <script src="JS/bootstrap.js" type="text/javascript"></script> 

	<title>Pagina principal</title>
</head>
<body>

  <header>
  	<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark "> 		
    	<a class="navbar-brand" href="?pg=carouselPrincipal.php">
    		<img src="../Recursos/Imagenes/rent a car.png" width="300" height="60" alt=""></a>

      <ul class="navbar-nav mr-auto justify-content-md-left">
      <li class="nav-item active">
        <a class="nav-link lead" href="?pg=frmInicioSesion.php" style="margin-left: 850px">Iniciar sesion</a></li>
      </ul>

  	</nav> 
  </header>

  <section><?php include $pg ?></section>

  <footer class="bg-dark">
    <div class="container-fluid text-center py-3">Eso es todo amigos</div>
    <div class="footer-copyright text-center py-3">© 2018 Copyright</div>
  </footer>

</body>
</html>

<?php   
    if (@$x == 1) {
        echo "<script>alert('Sesion cerrada')</script>";
    } ?>