<?php 
        include_once "inc/header.php"; 
        include_once "autoload.php";
        use Classes\Validator;

        function validar(): string{
            $resultadoValidacion = "";
            if (isset($_POST["nombreUsuario"]) && isset($_POST["numSumas"]) && isset($_POST["numRestas"])){                
                if (!Validator::validateName($_POST["nombreUsuario"])){                
                    $resultadoValidacion .= "<p class='error'> Error de Validación del Nombre. Introduzca un nombre correcto </p>";
                }
                
                if (!Validator::validatePositiveInt($_POST["numSumas"])){
                    $resultadoValidacion .= "<p class='error'> Error: el número de sumas tiene que ser un número positivo o igual a cero</p>";            
                }
                
                if (!Validator::validatePositiveInt($_POST["numRestas"])){
                    $resultadoValidacion .= "<p class='error'> Error: el número de restas tiene que ser un número positivo o igual a cero</p>";            
                }
            }else{
                $resultadoValidacion = "<p class='error'> Acceso invalido a la aplicacion </p>";
            }
            return $resultadoValidacion;
        }
        

        try{
            $validacionLocal = validar();
            if (empty($validacionLocal)){
                // Habría que validar previamente si se quieren tener todos los errores a la vez.            
                $test = new Classes\Test($_POST["nombreUsuario"], $_POST["numSumas"], $_POST["numRestas"]);
                include "generarPregunta.php";
            }else{
                echo $validacionLocal;
                echo "<p><a href='index.php'>Acceso Aplicación</a></p>";
            }
            

        }catch(\Exception $e){
            echo "<p class='error'>Error: ".$e->getMessage() . "</p>";
            echo "<p><a href='index.php'>Acceso Aplicación</a></p>";
        }catch(\Throwable $t){
            echo "<p class='error'>Error: ".$t->getMessage() . "</p>";
            echo "<p><a href='index.php'>Acceso Aplicación</a></p>";
        }     

    include_once "inc/footer.php";
?>
