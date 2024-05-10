<?php

$host = "localhost";
$usuario = "root";
$contraseña = "";
$baseDeDatos = "viasaludable";

$conexion = mysqli_connect($host, $usuario, $contraseña, $baseDeDatos);

if(!$conexion){
    die("Error: No se pudo conectar. " . mysqli_connect_error());
}

?>