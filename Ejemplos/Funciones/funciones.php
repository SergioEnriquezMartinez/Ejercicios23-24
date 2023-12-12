<?php
/*
function diaSemana($semana) {   // Paso de parámetro por valor
//function diaSemana(&$semana) {  Paso de parámetro por referencia
  $dia = $semana[rand(0, 6)];
  $semana[0] = "L";
  $semana[1] = "M";
  $semana[2] = "X";
  return $dia;
}

$semana = [ "lunes", "martes", "miércoles",
"jueves", "viernes", "sábado", "domingo" ];

for($i=1;$i<=10;$i++){
  $diaCine = diaSemana($semana);
  echo "El próximo $diaCine voy al cine. <br>";
}*/

// PARÁMETROS POR VALOR Y REFERENCIA:
/*
function duplicarPorValor($argumento) {
  $argumento = $argumento * 2;
  echo "Dentro de la función: $argumento.<br>";
}
function duplicarPorReferencia(&$argumento) {
  $argumento = $argumento * 2;
  echo "Dentro de la función: $argumento.<br>";
}

$numero1 = 5;
echo "Antes de llamar: $numero1.<br>";
duplicarPorValor($numero1);
echo "Después de llamar: $numero1.<br>";
echo "<br>";

$numero2 = 7;
echo "Antes de llamar: $numero2.<br>";
duplicarPorReferencia($numero2);
echo "Después de llamar: $numero2.<br>";
*/

// PARÁMETROS OPCIONALES/POR DEFECTO
/*
function obtenerCapital($pais = "todos") {
  $capitales = array("Italia" => "Roma",
                    "Francia" => "Paris",
                    "Portugal" => "Lisboa");

  if ($pais == "todos") {
      // return array_values($capitales);
      // return array_keys($capitales);
  } else {
      return $capitales[$pais];
  }
}

print_r(obtenerCapital());
echo "<br/>";
echo obtenerCapital("Francia");
*/

/*
function saluda($nombre, $prefijo = "Sr") {
  echo "Hola ".$prefijo." ".$nombre. "<br>";
}

saluda("Aitor", "Mr");
saluda("Aitor");
saluda("Marina", "Srta");
*/

// PARÁMETROS VARIABLES:
//  funcion func_num_args --> retorna un numero
//  funcion func_get_arg($i) --> retornar un valor
//  funcion func_get_args  --> retorna el array con todos los argumentos
function sumaParametros() {
  $numeros = func_get_args();
  $suma = 0;
  foreach ($numeros as $num) $suma += $num;
  return $suma;
  
}

function sumaParametros2(...$numeros) {
  $suma = 0;
  foreach ($numeros as $num) $suma += $num;
  return $suma;
}

echo sumaParametros2(3, 4, 10);
