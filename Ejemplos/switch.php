<?php

$dia = "sabado";
switch ($dia) {
    case "lunes":
    case "martes":
    case "miercoles":
    case "jueves":
    case "viernes":
        echo "Dia lectivo";
        break;
    case "sabado":
    case "domingo":
        echo "Dia festivo";
        break;
    default:
        echo "Dia erroneo";
}
