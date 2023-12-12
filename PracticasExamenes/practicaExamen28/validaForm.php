<?php
include_once "inc/header.php";
require_once "autoload.php";

use app\Validator;
use app\Cuadrado;
use app\Rectangulo;
use app\Triangulo;
use app\Rombo;

function validar()
{
    $listaErrores = "";
    if (isset($_POST["nombreUsuario"]) && isset($_POST["altura"]) && isset($_POST["base"])) {
        if (!Validator::validateName($_POST["nombreUsuario"])) $listaErrores = "Error en el nombre";
        switch ($_POST["listaFiguras"]) {
            case "rectangulo":
                if (!Validator::positiveInt($_POST["base"]) && !Validator::positiveInt($_POST["altura"])) $listaErrores .= "Error, la base y altura tienen que ser un numero positivo mayor que 0";
                if ($_POST["altura"] == $_POST["base"]) $listaErrores .= "Error, la altura y la base no pueden ser igual";
                break;
            case "rombo":
                if (!Validator::positiveInt($_POST["altura"])) $listaErrores .= "Error, la altura y altura tienen que ser un numero positivo mayor que 0";
                if (!Validator::isOdd($_POST["altura"])) $listaErrores .= "Error, la altura tiene que ser impar";
                break;
            case "cuadrado":
                if (!Validator::positiveInt($_POST["base"])) $listaErrores .= "Error, la base tiene que ser un numero positivo mayor que 0";
                break;
            case "triangulo":
                if (!Validator::positiveInt($_POST["altura"])) $listaErrores .= "Error, la altura que ser un numero positivo mayor que 0";
                break;
            case "valorPorDefecto":
                $listaErrores .= "Error, escoge una figura";
        }
        return $listaErrores;
    } else
        $listaErrores .= "<p>Error en la aplicacion <a href='index.php'>Volver</a></p>";
    return $listaErrores;
}

$validacion = validar();

if (empty($validacion)) {
    switch ($_POST["listaFiguras"]) {
        case "cuadrado":
            $figura = new Cuadrado($_POST["base"]);
            break;
        case "rectangulo":
            $figura = new Rectangulo($_POST["base"], $_POST["altura"]);
            break;
        case "triangulo":
            $figura = new Triangulo($_POST["altura"]);
            break;
        case "rombo":
            $figura = new Rombo($_POST["altura"]);
            break;
    }
    $nombre = $_POST["nombreUsuario"];
    $figuraSerializada = urlencode(serialize($figura));
    echo "<form action='resultado.php' method='post'>";
    echo "<input type='hidden' name='nombre' value='$nombre'>";
    echo "<input type='hidden' name='objeto' value='$figuraSerializada'/>";
    echo "<input type='submit' value='Mostrar Figura'>";
    echo "</form>";
} else {
    echo "<p>$validacion <a href='index.php'>Volver</a>";
}

include_once "inc/footer.php";
