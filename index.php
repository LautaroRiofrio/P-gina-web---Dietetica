<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vía Saludable</title>
    <link rel="stylesheet" type="text/css" href="assets/style.css">
</head>
<body>
    <nav>
        <ul>
            <img src="./img/logo.png" alt="" class="logo">
            
            
            <li><a href="" class="ultimo" >Contacto</a></li>
            <li><a href="">Categorías</a></li>
            <li><a href="">Inicio</a></li>

        </ul>
    </nav>

    <header>
        <div class="dark"></div>
        <h1 class="h1_header">Vía Saludable</h1>
    </header>
    <h1 class="h1_seccion">Categorías</h1>
    <div class="contenedor_grid">
        <?php 
            include('conexion.php');

            $query = "SELECT * FROM categorias";
            $resultado = $conexion->query($query);

            while($row = $resultado -> fetch_assoc()){
        ?>

        <a class="tarjeta" href="productos.php?id=<?php echo $row['id']; ?>">
            <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" />    
            <div class="nombre_categoria"> <?php echo $row['nombre']; ?></div>
        </a>
                
        <?php
            }
        ?>
        
    </div>
    <h1 class="h1_seccion">Ofertas</h1>
    <diva class="contenedor_grid">
        <?php 
            $queryOferta = "SELECT * FROM productos WHERE oferta = 1";
            $resultadoOferta = $conexion->query($queryOferta);
            if($resultadoOferta && $resultadoOferta->num_rows > 0){
                $num_row = min(4, $resultadoOferta->num_rows);
                for($i = 0; $i < $num_row; $i++){
                    $rowOferta = $resultadoOferta->fetch_assoc();
        ?>
                    <div class="tarjeta_producto">
                        <div class="oferta">-<?php echo 100 - (($rowOferta['precio_oferta'] / $rowOferta['precio'])* 100) ?>%</div>
                        <img class="imagen_producto" src="data:image/jpg;base64,<?php echo base64_encode($rowOferta['imagen']); ?>" /> 
                        <div class="nombre_producto"> <?php echo $rowOferta['nombre']; ?></div><br>
                        <div class="precio_producto"><p class="tachado">$<?php echo $rowOferta['precio']; ?></p> <p class="precio_oferta">$<?php echo $rowOferta['precio_oferta']; ?></p></div>
                        <a class="ver_producto" href="verProducto.php?id=<?php echo $rowOferta['id'] ?>">Ver más</a>
                    </div>
        <?php
                }
            }
        ?>
        <!-- <a class="mas_ofertas" href="ofertas.php">Más Ofertas</a> -->
        <button class="mas_ofertas" onclick="location.href='ofertas.php';">Más Ofertas</button>
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