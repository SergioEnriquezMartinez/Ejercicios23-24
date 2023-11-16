    <?php
        include_once "inc/header.php";
        require_once "autoload.php";

        use Classes\Generic;
        use Classes\Operation;
        

        $nombreUsuario = $_POST["nombreUsuario"];
        $numSumas = $_POST["numSumas"];
        $numRestas = $_POST["numRestas"];
        $total = $numSumas + $numRestas;
        $contSumas = $_POST["contSumas"]??0;
        $contSumasCorrectas = $_POST["contSumasCorrectas"]??0;
        $contRestas = $_POST["contRestas"]??0;
        $contRestasCorrectas = $_POST["contRestasCorrectas"]??0;
        $respuesta = $_POST["respuesta"]??0;
        $numPreguntas = $_POST["numPreguntas"]??0;
        $operador = $_POST["operador"]??"";
        $operando1 = $_POST["operando1"]??"";
        $operando2 = $_POST["operando2"]??"";

        // ¿Qué hay que hacer?
        if ($numPreguntas > 0){
            // Ya se ha presentado una pregunta al usuario. Hay que corregirla:
            $operation = new Operation($operador, $operando1, $operando2, $respuesta);             
            if ($operation->solve()){
                if ($operador == Operation::$SUMA) $contSumasCorrectas++;
                if ($operador == Operation::$RESTA) $contRestasCorrectas++;
            }             
        }
        if ($numPreguntas == $total){
            // Test Finalizado. Mostrar resultados
            include_once "resultados.php";
            exit();
        }

        // Mostrar una operación aleatoria al usuario:
        $operador = Generic::chooseOperator($numSumas, $numRestas, $contSumas, $contRestas);
        $numPreguntas++;        
        $operando1 = Generic::aleatorio(1, 9);
        $operando2 = Generic::aleatorio(1, 9);
        if ($operador == Operation::$SUMA) $textoOperador = "SUMA";
        if ($operador == Operation::$RESTA) $textoOperador = "RESTA";


        // Mostrar Formulario:
        echo "<fieldset>";
		echo "<legend>Test $numPreguntas/$total</legend>";
        echo "<form action='generarPregunta.php' method='post'>
                <p>¿$operando1 $textoOperador $operando2?</p>
                <p><label for='respuesta'>Respuesta:</label> 
                <input type='text' name='respuesta' id='respuesta'></p>
                <p><input type='submit' value='Siguiente'></p>

                <input type='hidden' name='nombreUsuario' value='$nombreUsuario'/>
                <input type='hidden' name='numSumas' value='$numSumas'/>
                <input type='hidden' name='numRestas' value='$numRestas'/>
                <input type='hidden' name='operador' value='$operador'/>
                <input type='hidden' name='operando1' value='$operando1'/>
                <input type='hidden' name='operando2' value='$operando2'/>
                <input type='hidden' name='contSumas' value='$contSumas'/>
                <input type='hidden' name='contRestas' value='$contRestas'/>
                <input type='hidden' name='contSumasCorrectas' value='$contSumasCorrectas'/>
                <input type='hidden' name='contRestasCorrectas' value='$contRestasCorrectas'/>
                <input type='hidden' name='numPreguntas' value='$numPreguntas'/>
              </form>
              </fieldset>";
        include_once "inc/footer.php";              
    ?>
