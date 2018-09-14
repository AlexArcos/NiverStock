<?php  
extract($_REQUEST);
?>

<div class="login-page">
    <div class="form">
        <form class="login-form" name="frmInicioSesion" method="post" action="../Controlador/ctrlInicioSesion.php">
            <p>INICIO DE SESIÓN</p>
            <input type="hidden" name="opcion" value="1">
            <input type="text" name="txtUser" id="txtUser" placeholder="username" required>
            <input type="password" name="txtPass" id="txtPass" placeholder="password">
            <button>login</button>
        </form>
    </div>
</div>

<?php
    if (@$x == 2) {
        echo "<script>alert('No ha iniciado sesion')</script>";
    }
?>
