<?php
namespace Manu\CarritoMvc\Controllers;
class ErrorController{
    public function index(){
    }
    public function mostrar404(){
        echo "<p class='error'>Error 404, el recurso solicitado no existe </p>";
    }
}