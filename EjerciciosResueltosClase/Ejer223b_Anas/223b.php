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

        function tablaMultiplicar($num){
            for($j=0 ; $j<=10 ; $j++){
                $result= $num*$j;
                echo"$num x $j  = $result <br/>";
            }
        }

        $num1= $_GET["numero1"];
        $num2= $_GET["numero2"];
        if ($num1 > $num2) { 
            for($i=$num1 ; $i>=$num2 ; $i-- ){
                tablaMultiplicar($i);
                /*for($j=0 ; $j<=10 ; $j++){
                    $result= $i*$j;
                    echo"$i x $j  = $result <br/>";
                }*/
                echo"<br/> <br/>";
            }
        
        
        } else {
            for($i=$num1 ; $i<=$num2 ; $i++){
                tablaMultiplicar($i);
                /*for($j=0 ; $j<=10 ; $j++){
                    $result= $i*$j;
                    echo"$i x $j  = $result <br/>";
                }*/
                echo"<br/> <br/>";
            }
        }
    
    ?>

</body>
</html>