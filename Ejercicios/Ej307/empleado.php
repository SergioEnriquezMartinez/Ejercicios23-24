<?php
class Empleado307 extends Persona307 {

    private int $sueldo;


    public function __construct(string $nombre, string $apellidos, int $sueldo){
        parent::__construct($nombre, $apellidos);
        $this->sueldo = $sueldo;
    }


    public function setSueldo(int $s) {
        $this->sueldo = $s;
    }

    public function getSueldo() : int {
        return $this->sueldo;
    }



    public function debePagarImpuestos() : bool {
        return $this->sueldo > 3333;
    }

    public static function toHtml($emp) : string {
        return "<p>Empleado: " . $emp->getNombreCompleto() . " con un sueldo de " . $emp->getSueldo . "</p>";
    }


}
