<?php
    namespace Sergi\ProyectoBlog\Entidades;

    class CategoriaEntidad
    {
        private $id;
        private $nombre;
        
        public function __construct(){}

        public function setId($id){$this->id = $id; return $this;}
        public function setNombre($nombre){$this->nombre = $nombre; return $this;}

        public function getId(){return $this->id;}
        public function getNombre(){return $this->nombre;}
    }

?>