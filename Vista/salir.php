 <?php
session_start();
session_unset();
session_destroy();

header('location: frmPaginaPrincipal.php?x=1');

