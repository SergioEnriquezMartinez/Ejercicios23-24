<?php
    namespace Sergi\ProyectoBlog\Ayudantes;

    class Autenticacion 
    {
        public static function isUserAdminLogged() : bool {
            return (isset($_SESSION["user"]) && $_SESSION["user"]->rol === "admin");
            
        }

        public static function isUserLogged() : bool {
            return (isset($_SESSION["user"]));
        }
    }
?>