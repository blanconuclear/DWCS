<?php
session_start(); // Iniciar sesión

// Destruir la sesión y eliminar las variables de sesión
session_unset();
session_destroy();

// Redirigir de nuevo a sesion1a.php
header("Location: sesion1a.php");
exit(); // Asegurarse de que el script termina aquí
