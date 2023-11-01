<?php
/*Copia la clase del ejercicio anterior y modifícala. 
Añade una constante SUELDO_TOPE con el valor del sueldo que debe pagar impuestos, y modifica el código para utilizar la constante. */

class Empleado {

    private string $nombre;
    private string $apellido;
    private int $sueldo;
    const SUELDO_TOPE = 3333;

    public function __construct(string $nom, string $ap, int $s = 1000){
        $this->nombre = $nom;
        $this->apellido = $ap;
        $this->sueldo = $s;
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
        return $this->sueldo > self::SUELDO_TOPE;
    }
}
?>