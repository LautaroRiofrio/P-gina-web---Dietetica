<?php 

include("../conexion/conexion.php");

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "INSERT INTO categorias(nombre,descripcion, imagen) VALUES('$nombre','$descripcion','$imagen')";
$resultado = $conexion->query($query);

if($resultado){
    header("Location: categorias.php");
} else {
    echo "Algo salio mal";
}
 


?>