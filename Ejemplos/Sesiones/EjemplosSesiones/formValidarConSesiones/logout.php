<?php
    session_start();
    // session_destroy();
    if (isset($_SESSION["userName"])) unset($_SESSION["userName"]);

    $_SESSION["info"] = "Logout correcto";
    header("location: formulario.php");
