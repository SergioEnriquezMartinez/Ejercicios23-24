<?php

    namespace Clases\Excepciones;
    
    class CupoSuperadoException extends VideoclubException
    {
        public function __construct($message)
        {
            parent::__construct($message);
        }
    }

?>