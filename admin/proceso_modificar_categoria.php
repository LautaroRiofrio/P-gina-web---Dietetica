<?php 

include("../conexion/conexion.php");
$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];

 
$query;
$resultado;
$imagen;
if (isset($_FILES["nueva_imagen"]) && !empty($_FILES["nueva_imagen"]["name"])) {
    $imagen = file_get_contents($_FILES['nueva_imagen']['tmp_name']);
    $query = "UPDATE categorias SET nombre=?, descripcion=?, imagen=? WHERE id=?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sssi", $nombre, $descripcion, $imagen, $id);
} else {
    $query = "UPDATE categorias SET nombre=?, descripcion=? WHERE id=?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ssi", $nombre, $descripcion, $id);
}

// Ejecutar la consulta preparada
$resultado = $stmt->execute();


if($resultado){
    header("Location: categorias.php");
} else {
    echo "Algo salio mal";
}
 

// Cerrar la consulta preparada
$stmt->close();




?>