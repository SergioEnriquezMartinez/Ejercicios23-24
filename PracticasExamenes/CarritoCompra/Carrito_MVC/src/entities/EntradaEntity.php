<?php
	namespace Manu\Blog\Entities;

	class EntradaEntity{
        private $usuarioId;
        private $categpriaId;
        private $titulo;
        private $descripcion;
        public function __construct(){

        }   
        public function setUsuarioId($id){$this->usuarioId = $id; return $this;}
        public function setCategoriaId($categoriaId){$this->categpriaId = $categoriaId; return $this;}
        public function setTitulo($titulo){$this->titulo = $titulo; return $this;}
        public function setDescripcion($descripcion){$this->descripcion = $descripcion; return $this;}

        public function getUsuarioId(){ return $this->usuarioId;}
        public function getCategoriaId(){ return $this->categpriaId;}
        public function getTitulo(){ return $this->titulo;}
        public function getDescripcion(){ return $this->descripcion;}

    }