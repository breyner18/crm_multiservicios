<?php

session_start();

/* LIMPIAR SESIÓN */

session_unset();

/* DESTRUIR SESIÓN */

session_destroy();

/* REDIRECCIONAR */

header("Location: ../views/login.php");

exit;

?>