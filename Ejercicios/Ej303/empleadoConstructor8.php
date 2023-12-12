<?php
/*Copia la clase del ejercicio anterior y modifícala. Elimina los setters de nombre y apellidos, 
de manera que dichos datos se asignan mediante el constructor (utiliza la sintaxis de PHP7). Si el constructor recibe un tercer parámetro, será el sueldo del Empleado. 
Si no, se le asignará 1000€ como sueldo inicial.

303EmpleadoConstructor8.php: Modifica la clase y utiliza la sintaxis de PHP 8 de promoción de las propiedades del constructor.*/

class Empleado303b {

    public function __construct(
        private string $nombre,
        private string $apellido,
        private int $sueldo = 1000)
        {

    }


    public function setSueldo(int $s) {
        $this->sueldo = $s;
    }

    public function getSueldo() : int {
        return $this->sueldo;
    }


    public function getNombreCompleto() : string {
        return $this->nombre . " " . $this->apellido;
    }

    public function debePagarImpuestos() : bool {
        return $this->sueldo > 3333;
    }
}

?>