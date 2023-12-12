<?php
    namespace examen;
    class CrearRombos {

        public static function crearRombo($altura) : string {
            $resultado = "<pre>";
            
            for ($i = 0; $i < ($altura - 1); $i++) {
                if ($i % 2 == 0) {
                    $numeroEspacios = ($altura - $i) / 2;
                    for ($j = 0; $j <= $numeroEspacios; $j++) {
                        $resultado .= " ";
                    }
    
                    for ($k = 0; $k <= $altura - ($numeroEspacios * 2); $k++) {
                        $resultado .= "X";
                    }            
                    $resultado .= "\n";
                } 

            }
            for ($i = $altura; $i >= 0; $i--) {
                if ($i % 2 == 0) {
                    $numeroEspacios = ($altura - $i) / 2;
                    for ($j = 0; $j <= $numeroEspacios; $j++) {
                        $resultado .= " ";
                    }
    
                    for ($k = $altura - ($numeroEspacios * 2); $k >= 0; $k--) {
                        $resultado .= "X";
                    }           
                    $resultado .= "\n";
                } 

            }
            $resultado .= "</pre>";
            return $resultado;
        }
    }

?>