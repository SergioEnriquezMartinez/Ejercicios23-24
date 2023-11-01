<?php
/*Copia la clase del ejercicio anterior y modifícala.
Cambia la constante por una variable estática sueldoTope, de manera que mediante getter/setter puedas modificar su valor.*/

class Empleado {

    private string $nombre;
    private string $apellido;
    private int $sueldo;
    private static int $sueldoTope = 3333;

    public function __construct(string $nom, string $ap, int $s = 1000){
        $this->nombre = $nom;
        $this->apellido = $ap;
        $this->sueldo = $s;
    }


    public function setSueldo(int $s) {
        $this->sueldo = $s;
    }
    public static function setSueldoTope(int $s) {
        self::$sueldoTope = $s;
    }

    public function getSueldo() : int {
        return $this->sueldo;
    }
    public static function getSueldoTope() : int{
        return self::$sueldoTope;
    }


    public function getNombreCompleto() : string {
        return $this->nombre . " " . $this->apellido;
    }

    public function debePagarImpuestos() : bool {
        return $this->sueldo > self::SUELDO_TOPE;
    }
}
?>