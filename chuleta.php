<?php
//CREAR ARRAYS
$array = []; //array vacio
//var_dump($array);
$array = ["posicion1", "posicion2", "posicion3"]; //array normal
//var_dump($array);
$array = ["clave1" => "valor1", "clave2" => "valor2", "clave3" => "valor3"]; //array asociativo
//var_dump($array);
$matriz = []; //matriz
for ($i = 0; $i < 5; $i++) {
    for ($j = 0; $j < 5; $j++) {
        $matriz[$i][$j] = "celda $i-$j";
    }
}
//var_dump($matriz);
/*----------------------------------------------------------------------------------*/

//CREAR NUMEROS RANDOM
$num = rand(1, 10);
//var_dump($num);

/*----------------------------------------------------------------------------------*/

//sacar longitud array o string
$string = "hola soy un string";
$array = ["posicion1", "posicion2", "posicion3"];
$longitud = strlen($string);
//var_dump($longitud);
$longitud = count($array);
//var_dump($longitud);

/*----------------------------------------------------------------------------------*/

//EXPLODE : divide un string en un array
$string = "Hola, soy, una, cadena, de, string";
$array = explode(",", $string); //, es el delimitador
//var_dump($array);
//IMPLODE : convierte un array en un string
$array = ["hola", "soy", "un", "array"];
$string = implode(",", $array);
//var_dump($string);

/*----------------------------------------------------------------------------------*/

//MANIPULACION DE ARRAYS:
$array = ["posicion1", "posicion2", "posicion3"];
array_push($array, "posicion4"); //añade al final de un array
//var_dump($array);

array_pop($array); //elimina el ultimo elemento
//var_dump($array);

$resultado = array_search("posicion2", $array); //busca en el array y si lo encuentra devuelve la posicion, sino false
//importante, si hay mas de 1 elemento igual solo devuelve el 1º
//var_dump($resultado);

$posicionEliminar = array_search("posicion2", $array);
if ($posicionEliminar != false) array_splice($array, $posicionEliminar, 1); //unset elimina completamente la posicion
//posicionEliminar es el comiendo hasta de donde empienzas a eliminar y el 1 es la cantidad a eliminar, es decir
//si empiezas en la posicion 2 y indicas que vas a eliminar 1 elemento, elimina la posicion2

//var_dump($array);
$arrayNumeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$numPares = array_filter($arrayNumeros, function ($n) {
    return $n % 2 == 0;
}); // filtra los elementos de un array mediante una función de devolución de llamada.
//var_dump($numPares);

$arrayNumerosDesordenado = [2, 1, 4, 3, 6, 5, 8, 7, 10, 9];
sort($arrayNumerosDesordenado);
//var_dump($arrayNumerosDesordenado);

rsort($arrayNumerosDesordenado);
//var_dump($arrayNumerosDesordenado);

$frutas = ["Banzanas" => 3, "Aaranjas" => 2, "Cvas" => 5];
ksort($frutas); //ordena arrays asociativos segun su clave 
//print_r($frutas);

krsort($frutas); //desordena arrays asociativos segun su clave
//print_r($frutas);

shuffle($arrayNumeros); //desordena un array
//print_r($arrayNumeros);

foreach($arrayNumeros as $valor) echo $valor; //forEach
foreach ($frutas as $key => $value) { echo "$key+$value";
}

/*---------------------------------------------------------------------------------*/