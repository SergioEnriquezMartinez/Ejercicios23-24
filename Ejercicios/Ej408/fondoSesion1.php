<!--
     Modifica el ejercicio anterior para almacenar el color de fondo en la sesión y no emplear cookies. Además, debe contener un enlace al siguiente archivo.
-->

<?php
    session_start();
    $limiteSesion = 10;
    if(isset($_GET["colores"])){
        $color = $_GET["colores"];
        $_SESSION["color"] = $_GET["colores"];
        $_SESSION["inicioSesion"] = time();
        $_SESSION["limiteSesion"] = $limiteSesion;
    }else{
        $color = isset($_SESSION["color"]) ? $_SESSION["color"] : "defecto";
        if (isset($_SESSION["inicioSesion"]) && time() - $_SESSION["inicioSesion"] > $limiteSesion) {
            $color = "defecto";
            $_SESSION["color"] = $color;
            $_SESSION["inicioSesion"] = time();
        }
    }

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
        <p>Selecciona un color para ponerlo de fondo</p>
        <form action="fondoSesion1.php">
            <select name="colores" id="colores">
                <option value="azul">Azul</option>
                <option value="rojo">Rojo</option>
                <option value="verde">Verde</option>
                <option value="amarillo">Amarillo</option>
            </select>
            <input type="submit" value="Enviar">
        </form>
        <p><a href="fondoSesion2.php">Enlace al siguiente archivo</a></p>
    </main>
</body>
</html>