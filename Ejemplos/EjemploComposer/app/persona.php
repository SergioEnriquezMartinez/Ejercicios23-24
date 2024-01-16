<?php
namespace Iesam\ProyectoMonolog;

class Persona {
    private string $nombre;
    private string $apellidos;
    public static int $contObjetosPersona=0;

    public function __construct(string $nombre, string $apellidos="") {            
        $this->nombre = $nombre;
        $this->apellidos = $apellidos;
        self::$contObjetosPersona++;

        // Se podría construir el objeto 
        //  solo con el apellido? dejando el nombre
        //  un valor por defecto??
    }

    public function __destruct(){
        self::$contObjetosPersona--;
    }

    public function setNombre(string $nombre) {
        $this->nombre = $nombre;
    }
    public function setApellidos(string $apellidos) {
        $this->apellidos = $apellidos;
    }
  

    public function imprimir(): string{
        return "$this->nombre $this->apellidos";
    }

    public function __toString(){
        return $this->imprimir();
    }
}

