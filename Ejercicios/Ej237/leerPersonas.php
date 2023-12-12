<?php
    if (isset ($_GET["cantidad"])) {
        $cantidad = $_GET["cantidad"];
        echo "<form action='gestionarPersonas.php' method='get'>";
                for ($i=0; $i < $cantidad; $i++) { 
                    echo "<p>
                        <label for='nombre'>Nombre</label>
                        <input type='text' name='nombre' id='nombre'>
                    
                        <label for='altura'>Altura</label>
                        <input type='text' name='altura' id='altura?>

                        <label for='email'>Email</label>
                        <input type='email' name='email' id='email'>
                    </p>";
        }
        echo "<input type='hidden' name='cantidad' value='$cantidad'>
            <input type='submit' value='Enviar'>";
    } else {
        echo "<h3>Introduce un valor correcto, por favor.</h3>";
    }
?>