<?php
/*Copia las clases del ejercicio anterior y modifícalas. Crea en Persona el método estático toHtml(Persona $p), y modifica en Empleado el mismo método toHtml(Persona $p), pero cambia la firma para que reciba una Persona como parámetro.
Para acceder a las propiedades del empleado con la persona que recibimos como parámetro, comprobaremos su tipo:


class Empleado extends Persona {
    /// resto del código


    public static function toHtml(Persona $p): string {
        if ($p instanceof Empleado) {
            // Aqui ya podemos acceder a las propiedades y métodos de Empleado
        }
    }
} */