<?php 

include("conexion.php");
$id = $_REQUEST['id'];


$query = "DELETE FROM categorias WHERE id='$id'";
$resultado = $conexion->query($query);

if($resultado){
    header("Location: mostrar.php");
} else {
    echo "Algo salio mal";
}
 


?>