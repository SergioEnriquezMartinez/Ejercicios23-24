<?php
    include_once "includes/header.php";
    //require_once "autoload.php";
    //use Validator;
    include_once "app/classes/Validator.php";

    function validar(): string {
        $resultadoValidacion = "";
        if (isset($_GET["nombre"]) && isset($_GET["email"]) && isset($_GET["pass1"]) && isset($_GET["pass2"]) && isset($_GET["date"])) {

            if (!Validator::validaNombre($_GET["nombre"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">El nombre no es correcto.</p></a>";
            }

            if (!Validator::validarEmail($_GET["email"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">El email no es correcto.</p></a>";
            }

            if (!Validator::validarContraseña($_GET["pass1"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">La contraseña no es correcta.</p></a>";
            }

            if (!Validator::validarContraseña($_GET["pass2"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">La contraseña no es correcta.</p></a>";
            }

            if (!Validator::validarContraseñaIguales($_GET["pass1"], $_GET["pass2"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">Las contraseñas no son iguales.</p></a>";
            }

            if (!Validator::validarFecha($_GET["date"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">La fecha no es correcta.</p></a>";
            }
        } else {
            $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">No tiene acceso a la aplicacion.</p></a>";
        }
        return $resultadoValidacion;
    }

    $validacionLocal = validar();

    if (empty($validacionLocal)) {
        include_once "resultado.php";
    } else {
        echo $validacionLocal;
        echo "<a href=\"index.php\"><p>Acceso a la aplicacion</p></a>";
    }

    include_once "includes/footer.php";
?>