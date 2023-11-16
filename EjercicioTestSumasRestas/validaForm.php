<?php 
        include_once "inc/header.php"; 
        require_once "autoload.php";
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

        $validacionLocal = validar();
        if (empty($validacionLocal)){
            include_once "generarPregunta.php";
        }else{
                echo $validacionLocal;
                echo "<p><a href='index.php'>Acceso Aplicación</a></p>";                
        }
        
        include_once "inc/footer.php"; 
    ?>