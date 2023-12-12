<?php
    namespace examen;
    include_once "inc/header.php";
    include_once "app/clases/validator.php";

    function validar() : string {
        $resultadoValidacion = "";

        if (isset($_GET["nombre"]) && isset($_GET["altura"]) && isset($_GET["rombos"])) {
            if (!Validator::validarNombre($_GET["nombre"])) {
                $resultadoValidacion .= "<p class=\"error\">El nombre introducido debe coincidir con el siguiente formato: la primera letra del nombre y de los apellidos en mayúsculas y el resto en minúsculas</p>";
            }
            if (!Validator::validarEnteros($_GET["altura"])) {
                $resultadoValidacion .= "<p class=\"error\">La altura tiene que ser un número entero positivo</p>";
            }
            if (!Validator::validarAltura($_GET["altura"])) {
                $resultadoValidacion .= "<p class=\"error\">La altura tiene que ser un número impar</p>";
            }
            if (!Validator::validarNumRombos($_GET["rombos"]) || !Validator::validarEnteros($_GET["rombos"])) {
                $resultadoValidacion .= "<p class=\"error\">El número de rombos tiene que ser un número entero positivo comprendido entre 1 y 6</p>";
            }
        } else {
            $resultadoValidacion = "<p class=\"error\">El formulario está vacio</p>";
        }
        return $resultadoValidacion;
    }

    try {
        $validacionLocal = validar();

        if (empty($validacionLocal)) {
            include_once "resultado.php";
            ?>
            <form action="resultado.php" method="get">
                <input type="hidden" name="altura" id="altura" value="$_GET['altura']">
                <input type="hidden" name="rombos" id="rombos" value="$_GET['rombos']">
            </form>
            <?php
        } else {
            echo $validacionLocal;
            echo "<a href=\"index.php\"><p class=\"error\">[Volver al formulario]</p></a>";
        }
    } catch(\Exception $e) {
        echo "<p class=\"error\">Error:".$e->getMessage()."</p>";
        echo "<a href=\"index.php\"><p class=\"error\">[Volver al formulario]</p></a>";
    } catch (\Throwable $th) {
        echo "<p class=\"error\">Error:".$e->getMessage()."</p>";
        echo "<a href=\"index.php\"><p class=\"error\">[Volver al formulario]</p></a>";
}

    include_once "inc/footer.php";
?>