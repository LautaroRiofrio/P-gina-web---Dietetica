<?php 

include("../conexion/conexion.php");
$id = $_REQUEST['id'];


$query = "DELETE FROM productos WHERE id='$id'";
$resultado = $conexion->query($query);

if($resultado){
    header("Location: productos.php");
} else {
    echo "Algo salio mal";
}
 


?>