<?php 

include("../conexion/conexion.php");
$id = $_REQUEST['id'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$peso = $_POST['peso'];
$origen = $_POST['origen'];
$precio = $_POST['precio'];
$oferta = false;
if (isset($_POST['oferta'])){
    // $oferta = $_POST['oferta'] === "true";
    $oferta = isset($_POST['oferta']) ? 1 : 0;
} else {
    $oferta = false;
}
$precio_oferta = isset($_POST['precio_oferta']) ? intval($_POST['precio_oferta']) : 0;
$categoria;
if(isset($_POST['categorias']) && !empty($_POST['categorias'])) {
    foreach($_POST['categorias'] as $opcion_id) {
        $categoria = $opcion_id;
    }
} else {
    echo "No se seleccionó ninguna opción.";
}


// $query;
// $resultado;
// $imagen;
// if (isset($_FILES["nueva_imagen"]) && !empty($_FILES["nueva_imagen"]["name"]) ){
//     $imagen = addslashes(file_get_contents($_FILES['nueva_imagen']['tmp_name']));
//     $query = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', imagen='$imagen', stock='$stock', peso='$peso', origen='$origen', precio='$precio', oferta='$oferta', precio_oferta='$precio_oferta', categoria='$categoria' WHERE id=$id";
//     $resultado = $conexion->query($query);
// } else {
//     $query = "UPDATE productos SET nombre='$nombre', descripcion='$descripcion', stock='$stock', peso='$peso', origen='$origen', precio='$precio', oferta='$oferta', precio_oferta='$precio_oferta', categoria='$categoria' WHERE id=$id";
//     $resultado = $conexion->query($query);
// }


// if($resultado){
//     header("Location: productos.php");
// } else {
//     echo "Algo salio mal";
// }
 
$query;
$resultado;
$imagen;
if (isset($_FILES["nueva_imagen"]) && !empty($_FILES["nueva_imagen"]["name"])) {
    $imagen = file_get_contents($_FILES['nueva_imagen']['tmp_name']);
    $query = "UPDATE productos SET nombre=?, descripcion=?, imagen=?, stock=?, peso=?, origen=?, precio=?, oferta=?, precio_oferta=?, categorias=? WHERE id=?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sssidsdsssi", $nombre, $descripcion, $imagen, $stock, $peso, $origen, $precio, $oferta, $precio_oferta, $categoria, $id);
} else {
    $query = "UPDATE productos SET nombre=?, descripcion=?, stock=?, peso=?, origen=?, precio=?, oferta=?, precio_oferta=?, categorias=? WHERE id=?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("sssidsdssi", $nombre, $descripcion, $stock, $peso, $origen, $precio, $oferta, $precio_oferta, $categoria, $id);
}

// Ejecutar la consulta preparada
$resultado = $stmt->execute();


if($resultado){
    header("Location: productos.php");
} else {
    echo "Algo salio mal";
}
 

// Cerrar la consulta preparada
$stmt->close();




?>