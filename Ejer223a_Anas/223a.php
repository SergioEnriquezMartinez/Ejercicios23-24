<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>Document</title>
</head>
<body>
    <h1>Resultado</h1>
    <?php
        if (isset($_GET["numero"])){
            $num= $_GET["numero"];
            for($i=0 ; $i<=10 ; $i++){
                $result= $num*$i;
                echo"$i x $num  = $result <br/>";
            }
        }else{
            echo "<h3 class='error'> Debes acceder a la aplicación por la página inicial </h3>";
        }        
    ?>
    <p>
        <a href="223a.html">Volver a la página de inicio</a>
    </p>
</body>
</html>