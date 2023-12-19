<!-- 
    Mediante el uso de cookies, crea una página con un desplegable con varios colores, de manera que el usuario pueda cambiar el color de fondo de la página (atributo bgcolor).
    Al cerrar la página, ésta debe recordar, al menos durante 24h, el color elegido y la próxima vez que se cargue la pagina, lo haga con el último color seleccionado.
-->
<?php
    if(isset($_GET["colores"])){
        $color = $_GET["colores"];
        setcookie("color", $color, time()+60*60*24);
    }

    echo $color;

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="fondo.css">
    <title>Ejercicio 407</title>
</head>
<?php
    echo '<body class="'.$color.'">';
?>
    <main>
        <p>Selecciona un color para ponerlo de fondo</p>
        <form action="fondo.php">
            <select name="colores" id="colores">
                <option value="azul">Azul</option>
                <option value="rojo">Rojo</option>
                <option value="verde">Verde</option>
                <option value="amarillo">Amarillo</option>
            </select>
            <input type="submit" value="Enviar">
        </form>
    </main>
</body>
</html>
