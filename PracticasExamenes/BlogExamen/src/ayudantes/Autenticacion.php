<?php
    namespace Sergi\ProyectoBlog\Ayudantes;

    class Autenticacion 
    {

        public static function isUserLogged() : bool {
            return (isset($_SESSION["user"]));
        }
    }
?>