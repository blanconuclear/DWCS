<?php
$user1 = "hugo";
$pass1 = "hugo";

$user2 = "Efren";
$pass2 = "Efren";

$user3 = "abc";
$pass3 = "abc";

$user4 = "lolo";
$pass4 = "lolo";

if (strcmp($_POST['usuario'], $user1) == 0 && strcmp($_POST['contrasinal'], $pass1) == 0) {
    echo "Acceso permitido";
} elseif (strcmp($_POST['usuario'], $user2) == 0 && strcmp($_POST['contrasinal'], $pass2) == 0) {
    echo "Acceso permitido";
} elseif (strcmp($_POST['usuario'], $user3) == 0 && strcmp($_POST['contrasinal'], $pass3) == 0) {
    echo "Acceso permitido";
} elseif (strcmp($_POST['usuario'], $user4) == 0 && strcmp($_POST['contrasinal'], $pass4) == 0) {
    echo "Acceso permitido";
} else {
    echo "Acceso denegado";
}
