<?php
	namespace Mgj\ProyectoBlog2024\Helpers;
	class Authentication{

        public static function isUserAdminLogged(): bool{
            return (isset($_SESSION['user']) && $_SESSION['user']['rol'] == "ADMIN");
        }

        public static function isUserLogged(): bool{
            return (isset($_SESSION['user']));
        }

    }