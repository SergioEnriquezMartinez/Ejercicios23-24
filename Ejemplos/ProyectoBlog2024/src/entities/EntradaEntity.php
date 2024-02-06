<?php
	namespace Mgj\ProyectoBlog2024\Entities;

	class EntradaEntity{
        private $id;
        private $usuarioId;
        private $categoriaId;
        private $titulo;
        private $descripcion;
        private $fecha;
        public function __construct(){

        }   
        public function setId($id){$this->id = $id; return $this;}
        public function setUsuarioId($usuarioId){$this->usuarioId = $usuarioId; return $this;}
        public function setCategoriaId($categoriaId){$this->categoriaId = $categoriaId; return $this;}
        public function setTitulo($titulo){$this->titulo = $titulo; return $this;}
        public function setDescripcion($descripcion){$this->descripcion = $descripcion; return $this;}
        public function setFecha($fecha){$this->fecha = $fecha; return $this;}

        public function getId(){ return $this->id;}
        
        public function getUsuarioId(){ return $this->usuarioId;}
        public function getCategoriaId(){ return $this->categoriaId;}
        public function getTitulo(){ return $this->titulo;}
        public function getDescripcion(){ return $this->descripcion;}
        public function getFecha(){ return $this->fecha;}

    }