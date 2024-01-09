<?php

    namespace Clases\Excepciones;


    class SoporteYaAlquiladoException extends VideoclubException
    {
        public function __construct($message)
        {
            parent::__construct($message);
        }
    
    }

?>