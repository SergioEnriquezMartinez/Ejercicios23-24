<?php
    namespace Sergi\ProyectoBlog\Controladores;

    class ErrorController
    {
        public function index() {}

        public function show404() {
            echo '<p class="error">Error 404, el recurso solicitado no existe</p>';
        }

        public function show403() {
            echo '<p class="error">Error 403, acceso denegado</p>';
        }
    }
?>