<?php


switch ($_POST['numero']) {
    case "lunes":
        echo "Hoy es lunes. Inicio de la semana.";
        break;
    case "martes":
        echo "Hoy es martes. Segunda jornada laboral.";
        break;
    case "miércoles":
        echo "Hoy es miércoles. Mitad de la semana.";
        break;
    case "jueves":
        echo "Hoy es jueves. Casi el fin de semana.";
        break;
    case "viernes":
        echo "Hoy es viernes. ¡Último día de trabajo!";
        break;
    case "sábado":
        echo "Hoy es sábado. Día de descanso.";
        break;
    case "domingo":
        echo "Hoy es domingo. Mañana vuelve la rutina.";
        break;
    default:
        echo "El día ingresado no es válido.";
        break;
}
