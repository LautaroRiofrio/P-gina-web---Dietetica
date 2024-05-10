<?php 

include("conexion.php");
$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

$query = "UPDATE categorias SET nombre='$nombre', descripcion='$descripcion', imagen='$imagen' WHERE id=$id";
$resultado = $conexion->query($query);

if($resultado){
    header("Location: mostrar.php");
} else {
    echo "Algo salio mal";
}
 


?>