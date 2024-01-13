<?php

class Files{
    private static string $file = "files/miarchivo.txt";
    
    public static function leerFichero(){
        if (!$fp = fopen(Files::$file, "r")){
            throw new Exception("Exception, El fichero " . Files::$file . " no se ha podido abrir en modo lectura");
        }

        // filesize() nos devuelve el tamaño del archivo en cuestión
        $contents = fread($fp, filesize(Files::$file));
        // Cerramos la conexión con el archivo
        fclose($fp);

        return $contents;
    }

    public static function leerFicheroPorLineas(){
        if (!$fp = fopen(Files::$file, "r")){
            throw new Exception("Exception, El fichero " . Files::$file . " no se ha podido abrir en modo lectura");
        }
        // Leer línea a línea
        $contents = array();
        while($linea = fgets($fp)){
            $contents[] = $linea;
        }
        
        // Cerramos la conexión con el archivo
        fclose($fp);

        return $contents;        
    }

    public static function escribirFichero(string $texto){
        // Modo escritura "w" (si el fichero existía, perdemos la información que tenía)
        // Modo append "a" (si el fichero existe, añade información al final)
        if (!$fp = fopen(Files::$file, "a")){
            throw new Exception("Exception, El fichero " . Files::$file . " no se ha podido abrir en modo escritura");
        }
        fwrite($fp, $texto);        

        // Cerramos la conexión con el archivo
        fclose($fp);
    }    
}