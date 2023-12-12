<!--Rellena un array bidimensional de 6 filas por 9 columnas con números aleatorios comprendidos entre 100 y 999 (ambos incluidos). Todos los números deben ser distintos,
es decir, no se puede repetir ninguno.
Muestra a continuación por pantalla el contenido del array de tal forma que:

La columna del máximo debe aparecer en azul.
La fila del mínimo debe aparecer en verde
El resto de números deben aparecer en negro.-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tablaDistintos.css">
    <title>Tabla 238</title>
</head>
<body>
    <?php
    //RELLENAMOS EL ARRAY
        $filas = 6;
        $columnas = 9; 
        $array[][] = null; 
        for ($i = 0; $i < $filas; $i++) {
            for ($j=0; $j < $columnas; $j++) { 
                $aleatorio = rand(100, 999);
                if (!in_array($aleatorio, $array)) {
                    $array[$i][$j] = $aleatorio;
                }       
            }
        }

    //BUSCAMOS EL NUMERO MAYOR Y EL NUMERO MENOR
        $mayor = 0;
        $menor = PHP_INT_MAX;
        for ($i=0; $i < $filas; $i++) { 
            for ($j=0; $j < $columnas; $j++) { 
                if ($array[$i][$j] > $mayor) {
                    $mayor = $array[$i][$j];
                }
                if ($array[$i][$j] < $menor) {
                    $menor = $array[$i][$j];
                }
            }
        }

    //MOSTRAMOS EL ARRAY CON LOS COLORES CORRESPONDIENTES
        $columnaMayor = 0;
        $filaMenor = 0;
        for($i = 0; $i < $filas; $i++) {
            for($j = 0; $j < $columnas; $j++) {
                if ($array[$i][$j] == $mayor) {
                    $columnaMayor = $j;
                } elseif ($array[$i][$j] == $menor) {
                    $filaMenor = $i;
                }
            }
        }
        
        echo '<table border="1">';
        for($i = 0; $i < $filas; $i++) {
            echo '<tr>';
            for($j = 0; $j < $columnas; $j++) {
                if ($i == $filaMenor) {
                    if ($j == $columnaMayor) {
                        echo '<td class="mayor menor">'.$array[$i][$j].'</td>';
                    } else {
                        echo '<td class="menor">'.$array[$i][$j].'</td>';
                    }
                } else {
                    if ($j == $columnaMayor) {
                        echo '<td class="mayor">'.$array[$i][$j].'</td>';
                    } else {
                        echo '<td>'.$array[$i][$j].'</td>';
                    }
                }
            }
            echo '</tr>';
        }
        echo '</table>';
    ?>
</body>
</html>