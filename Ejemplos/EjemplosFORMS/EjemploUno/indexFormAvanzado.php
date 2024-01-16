<?php

?>
<form action="recogerDatos.php" method="REQUEST">
    <p><label for="nombre">Nombre del alumno:</label>
        <input type="text" name="nombre" id="nombre" value="" />
    </p>
    <p>lenguajes que utilizas
        <select name="lenguajes"> <!-- En este caso no hace falta los corchetes porque solo va a estar seleccioanda una opcion -->
            <option value="porDefeto">Elija una opcion</option>
            <option value="c">C</option>
            <option selected value="java">Java</option>
            <option value="php">PHP</option>
            <option value="python">Python</option>
    </p>

<!-- Por defecto, coje la primera opcion *SE ENVIA OBLIGATORIAMENTE DEBIDO A QUE SIEMPRE VA A HABER ALGO SELECCIONADO*-->
<!-- El atributo SELECTED SIGNIFICA QUE LA OPCION POR DEFECTO ES LA QUE POSEE DICHO ATRIBUTO-->

    <p>lenguaje favorito
        <input type="radio" id="html" name="fav_language" value="HTML">
        <label for="html">HTML</label>
        <input checked type="radio" id="css" name="fav_language" value="CSS">
        <label for="css">CSS</label>
        <input type="radio" id="javascript" name="fav_language" value="JavaScript">
        <label for="javascript">JavaScript</label>
    </p>
    <!-- Para que solo se pueda seleccionar una opcion deberan tener el mismo nombre, *TAMPOCO SE ENVIAN SI NO SE SELECCIONAN*  -->

    <p><input checked type="checkbox" name="modulos[]" id="modulosDWES" value="DWES" />
        <label for="modulosDWES">Desarrollo web en entorno servidor</label>
    </p>

    <p><input type="checkbox" name="modulos[]" id="modulosDWEC" value="DWEC" />
        <label for="modulosDWEC">Desarrollo web en entorno cliente</label>
    </p>


    <input type="submit" value="modificar Alumno" name="modificar" />
    <input type="submit" value="alta alumno" name="alta" />

    <!-- Los [] del naame de los checkbox indican que queremos recibir la info en modo array (Mucho mas comodo)-->
    <!-- Si cambiamos el name de los checkbox y los ponemos distintos y sin los [] recibes la informacion normal, es decir, en string-->

    <!-- los input type text, date... siempre se envian , a diferencia de los checkbox que si no se seleccionan no se envian-->


    <!-- El atributo CHECKED en type RADIO y CHECKBOX SIGNIFICA QUE LA OPCION POR DEFECTO ES LA QUE POSEE DICHO ATRIBUTO-->

    </select>
</form>