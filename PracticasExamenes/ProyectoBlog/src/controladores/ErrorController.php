<?php
    namespace Sergi\ProyectoBlog\Controladores;

    class ErrorController
    {
        public function index() {}

        public function show404() {
            echo '<p class="error">Error 404, el recurso solicitado no existe</p>';
        }
    }
?>