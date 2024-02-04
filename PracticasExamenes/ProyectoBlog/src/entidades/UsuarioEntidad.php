<?php
    namespace Sergi\ProyectoBlog\Entidades;

    class UsuarioEntidad
    {
        private $id;
        private $nombre;
        private $apellidos;
        private $email;
        private $password;

        public function __construct() {}

        public function setId($id) {$this->id = $id; return $this;}
        public function setNombre($nombre) {$this->nombre = $nombre; return $this;}
        public function setApellidos($apellidos) {$this->apellidos = $apellidos; return $this;}
        public function setEmail($email) {$this->email = $email; return $this;}
        public function setPassword($password) {$this->password = $password; return $this;}

        public function getId() {return $this->id;}
        public function getNombre() {return $this->nombre;}
        public function getApellidos() {return $this->apellidos;}
        public function getEmail() {return $this->email;}
        public function getPassword() {return $this->password;}
    }

?>