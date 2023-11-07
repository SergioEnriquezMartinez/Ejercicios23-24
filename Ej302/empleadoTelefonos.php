<?php
/*Copia la clase del ejercicio anterior y modifícala. Añade una propiedad privada que almacene un array de números de teléfonos. Añade los siguientes métodos:
public function anyadirTelefono(int $telefono) : void → Añade un teléfono al array
public function listarTelefonos(): string → Muestra los teléfonos separados por comas*/

    class Empleado302 {

        public function __construct(
            private string $nombre,
            private string $apellido,
            private int $sueldo,
            private int $telefonos = []         
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

        public function aniadirTelefono(int $telefono) : void {
            array_push($this->telefonos, $telefono);
        }

        public function listarTelefonos() : string {
            foreach ($this->telefonos as $telfs) {
                return $telfs;
            }
        }
    }



?>