<?php
/*Copia la clase del ejercicio anterior en 307Empleado.php y modifícala.
Crea una clase Persona que sea padre de Empleado, de manera que Persona contenga el nombre y los apellidos, y en Empleado quede el salario y los teléfonos.*/

class Persona307 {
    private string $nombre;
    private string $apellido;

    public function __construct(string $nombre, string $apellido){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    public function setNombre(string $nom) {
        $this->nombre = $nom;
    }
    public function setApellido(string $ape) {
        $this->apellido = $ape;
    }

    public function getNombre() : string {
        return $this->nombre;
    }
    public function getApellido() : string {
        return $this->apellido;
    }
    
    public function getNombreCompleto() : string {
        return $this->nombre . " " . $this->apellido;
    }
}