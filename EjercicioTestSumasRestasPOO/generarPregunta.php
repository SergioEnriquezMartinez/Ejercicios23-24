<?php
        include_once "inc/header.php";
        include_once "autoload.php";
        use Classes\Test;

        // Recuperar el estado serializado en caso de que sea necesario:
        if (isset($_POST["objetoSerializado"])) $test = unserialize(urldecode($_POST["objetoSerializado"]));
        // Almacenar la respuesta del usuario:
        if (isset($_POST["respuesta"])) $test->setRespuesta($_POST["respuesta"]);

        // Hay que presentar alguna pregunta más?
        if ($test->getNumPreguntas() == $test->getCountOperaciones())
            include "resultados.php";
        else{
            $operation = $test->nextOperacion();
            $objetoSerializado = urlencode(serialize($test));
            /*echo "<pre>"; var_dump($test); echo "</pre>";
            echo "<br/>";
            echo "<br/>";
            echo "<pre>";var_dump($objetoSerializado);echo "</pre>";*/
            echo "<fieldset>";		            
            echo "<legend> Pregunta ". $test->getCountOperaciones() . "/" . $test->getNumPreguntas() . "</legend>";
            echo "
                <form action='generarPregunta.php' method='post'>
                    <p>".$operation->getOperation()."</p>".
                    "<label for='respuesta'>Respuesta:</label>
                    <input type='text' value='' name='respuesta'/>
                    <input type='submit' name='Continuar'/>
                    <input type='hidden' name='objetoSerializado' value='$objetoSerializado'/>
                </form>
            </fieldset>";
        }

        include_once "inc/footer.php";        
    ?>
