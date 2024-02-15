<?php
    namespace Sergi\ProyectoBlog\Entidades;

    class EntradaEntidad
    {
        private $id;
        private $usuario_id;
        private $categoria_id;
        private $titulo;
        private $descripcion;
        private $fecha;
        
        public function __construct(){}

        public function setId($id){$this->id = $id; return $this;}
        public function setUsuarioId($usuario_id){$this->usuario_id = $usuario_id; return $this;}
        public function setCategoriaId($categoria_id){$this->categoria_id = $categoria_id; return $this;}
        public function setTitulo($titulo){$this->titulo = $titulo; return $this;}
        public function setDescripcion($descripcion){$this->descripcion = $descripcion; return $this;}
        public function setFecha($fecha){$this->fecha = $fecha; return $this;}

        public function getId(){return $this->id;}
        public function getUsuarioId(){return $this->usuario_id;}
        public function getCategoriaId(){return $this->categoria_id;}
        public function getTitulo(){return $this->titulo;}
        public function getDescripcion(){return $this->descripcion;}
        public function getFecha(){return $this->fecha;}
    }
?>