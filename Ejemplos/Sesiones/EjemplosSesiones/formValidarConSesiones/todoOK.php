<?php
session_start();
if (!isset($_SESSION["userName"])){
    $_SESSION["accessError"] = "Error de acceso";
    header("location: formulario.php");
}
echo "<h1> Hola {$_SESSION['userName']} </h1>";
?>

<p><a href="logout.php">Logout</a></p>