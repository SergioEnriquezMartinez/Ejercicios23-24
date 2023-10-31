<?php
/*Crea una clase Empleado con su nombre, apellidos y sueldo. Encapsula las propiedades mediante getters/setters y añade métodos para:
Obtener su nombre completo → getNombreCompleto(): string
Que devuelva un booleano indicando si debe o no pagar impuestos (se pagan cuando el sueldo es superior a 3333€) → debePagarImpuestos(): bool-*/
 

    class Empleado {

        public function __construct(
            private string $nombre,
            private string $apellido,
            private int $sueldo            
        ){}


        public function setNombre(string $nom) {
            $this->nombre = $nom;
        }
        public function setApellido(string $ape) {
            $this->apellido = $ape;
        }
        public function setSueldo(int $s) {
            $this->sueldo = $s;
        }

        public function getNombre() : string {
            return $this->nombre;
        }
        public function getApellido() : string {
            return $this->apellido;
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