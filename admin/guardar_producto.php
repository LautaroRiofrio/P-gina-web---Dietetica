<?php 

include("../conexion/conexion.php");

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
$stock = isset($_POST['stock']) ? intval($_POST['stock']) : 0;
$peso = isset($_POST['peso']) ? intval($_POST['peso']) : 0;
$origen = $_POST['origen'];
$precio = isset($_POST['precio']) ? intval($_POST['precio']) : 0;
$oferta = false;
// echo $oferta;

if (isset($_POST['oferta'])){
    $oferta = $_POST['oferta'] === "true";
} else {
    $oferta = false;
}

// echo $oferta;


// if (isset($_POST['oferta']) && $_POST['oferta'] == true) {
//     $oferta = True;
// }
$precio_oferta = isset($_POST['precio_oferta']) ? intval($_POST['precio_oferta']) : 0;
$categoria;
if(isset($_POST['categorias']) && !empty($_POST['categorias'])) {
    foreach($_POST['categorias'] as $opcion_id) {
        $categoria = $opcion_id;
    }
} else {
    echo "No se seleccionó ninguna opción.";
}

$query = "INSERT INTO productos(nombre,descripcion, imagen, stock, peso, origen, precio, oferta, precio_oferta, categorias) VALUES('$nombre','$descripcion','$imagen', '$stock', '$peso', '$origen', '$precio', '$oferta', '$precio_oferta', '$categoria')";
$resultado = $conexion->query($query);

if($resultado){
    header("Location: productos.php");
} else {
    echo "Algo salio mal";
}
 


?>