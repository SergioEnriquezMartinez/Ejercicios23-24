<?php

    //Recogemos la cantidad

    $cantidad = $_GET["cantidad"];
    ?>
    <body>
        <form action="sumarDatos224.php" method="get">
            <?php
                for ($i=0; $i < $cantidad; $i++) { 
                echo "<p><label for=\"caja$i\">Introduce un número</label>
                    <input type=\"text\" name=\"caja$i\" id=\"caja$i\"></p>";
                }
                echo "<p><input type=\"hidden\" name=\"cantidad\" value=\"$cantidad\"></p>";
            ?>
            <p><input type="submit" value="Enviar"></p>
    </form>
</body>
    