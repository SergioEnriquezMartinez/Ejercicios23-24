<?php
    include_once "inc/header.php";
    include_once "app/clases/Validator.php";

    function validar(): string {
        $resultadoValidacion = "";
        if (isset($_GET["nombre"]) && isset($_GET["email"]) && isset($_GET["pass1"]) && isset($_GET["pass2"]) && isset($_GET["fecha"]) && isset($_GET["telf"]) && isset($_GET["cp"]) && isset($_GET["opciones"])) {
            if (!Validator::validaNombre($_GET["nombre"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">El nombre no es correcto.</p></a>";
            }
            if (!Validator::validaEmail($_GET["email"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">El email no es correcto.</p></a>";
            }
            if (!Validator::validarPass($_GET["pass1"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">La contraseña no es correcta.</p></a>";
            }
            if (!Validator::validarPass($_GET["pass2"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">La contraseña no es correcta.</p></a>";
            }
            if (!Validator::validarPassIguales($_GET["pass1"], $_GET["pass2"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">Las contraseñas no son iguales.</p></a>";
            }
            if (!Validator::validarFecha($_GET["fecha"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">La fecha no es correcta.</p></a>";
            }
            if (!Validator::validarTelefono($_GET["telf"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">El teléfono no es correcto.</p></a>";
            }
            if (!Validator::validarCP($_GET["cp"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">El código postal no es correcto.</p></a>";
            }
            if (!Validator::validarGenero($_GET["opciones"])) {
                $resultadoValidacion = "<a href=\"index.php\"><p class=\"error\">El género no es ninguno de los expuestos.</p></a>";
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

    include_once "inc/footer.php";

?>