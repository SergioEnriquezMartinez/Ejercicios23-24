<!--
    Debe mostrar el color y dar la posibilidad de:
        volver a la página anterior mediante un enlace
        y mediante otro enlace, vaciar la sesión y volver a la página anterior.
-->

<?php
    session_start();
    if (isset($_GET["vaciarSesion"])) {
        session_unset();
        session_destroy();
        header("Location: fondoSesion1.php");
    }

    $color = (isset($_SESSION["color"]) && time() - $_SESSION["inicioSesion"] <= $_SESSION["limiteSesion"]) ? $_SESSION["color"] : "defecto";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fondo.css">
    <title>Ejercicio 408</title>
</head>
<?php
    echo '<body class="'.$color.'">';
?>
    <main>
        <p><a href="fondoSesion1.php">Volver a la página anterior</a></p>
        <p><a href="fondoSesion2.php?vaciarSesion=1">Volver a la página anterior y vaciar la sesion</a></p>
    </main>
</body>
</html>