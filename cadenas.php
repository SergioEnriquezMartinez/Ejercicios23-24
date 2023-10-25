<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadenas</title>
</head>
<body>

    <?php
        $num1 = 33;
        $num2 = 27;
        $total = $num1 + $num2;
        echo '<p> Resultado1: $total </p>';
        echo '<p> Resultado2: ' .$total. '</p>';
        echo "<p> Resultado3: $total </p>";
        echo "<p> Resultado4: " . $total . "</p>";
        echo "<p> Resultado5: $num1+$num2 </p>";
        echo "<p> Resultado6: " . $num1+$num2 . "</p>";
        // Quiero mostrar: Resultado: "60"
        echo "<p> Resultado7: '$total' </p>";
        echo "<p> Resultado8: " . '"' . $total . '"' . "</p>";
        echo "<p> Resultado9: \"$total\" </p>";

        $color = "rojo";
        echo "El plural de $color es ${color}s";

        // https://php.watch/versions/8.2/$%7Bvar%7D-string-interpolation-deprecated
        echo "El plural de $color es {$color}s";
    ?>
</body>
</html>