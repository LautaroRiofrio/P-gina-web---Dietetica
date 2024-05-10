<?php
    include('conexion.php');
    // $id = $_REQUEST['id'];
    $query = "SELECT * FROM productos WHERE oferta=1";
    $resultado = $conexion->query($query);

    // $categoria = $conexion->query("SELECT * FROM categorias WHERE id=$id");
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vía Saludable</title>
    <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>
<body>
    <nav>
        <ul>
            <img src="./img/logo.png" alt="" class="logo">
            
            
            <li><a href="" class="ultimo" >Contacto</a></li>
            <li><a href="index.php">Inicio</a></li>

        </ul>
    </nav>
    <h1 class="h1_seccion">Ofertas</h1>
    <div class="contenedor_grid ">
        <?php 
            while($row = $resultado -> fetch_assoc()){
        ?>
            <div class="tarjeta_producto">
                <div class="oferta">-<?php echo 100 - (($row['precio_oferta'] / $row['precio'])* 100) ?>%</div>
                <img class="imagen_producto" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" /> 
                <div class="nombre_producto"> <?php echo $row['nombre']; ?></div><br>
                <div class="precio_producto"><p class="tachado">$<?php echo $row['precio']; ?></p> <p class="precio_oferta">$<?php echo $row['precio_oferta']; ?></p></div>
                <a class="ver_producto" href="verProducto.php?id=<?php echo $row['id'] ?>">Ver más</a>
            </div>
        <?php
            }
        ?>
        
    </div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const elementos = document.querySelectorAll('.imagen_producto');
        elementos.forEach(elemento => {
            const ancho = elemento.offsetWidth;
            elemento.style.height = `${ancho}px`;
        });
    });
</script>
</body>
</html>