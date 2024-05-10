
<?php 

    include('conexion.php');

    $id = $_REQUEST['id'];
    $query = "SELECT * FROM productos WHERE id='$id'";
    $resultado = $conexion->query($query);
    $row = $resultado->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/style.css">
</head>
<body>
    <nav>
        <ul>
            <img src="./img/logo.png" alt="" class="logo">
            
            
            <li><a href="" class="ultimo" >Contacto</a></li>
            <li><a href="index.php">Inicio</a></li>

        </ul>
    </nav>
    <div class="producto_contenedor contenedor">
        <img id="imagen_producto" src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" /> 
        <div>
            <h3 class="contenido" ><?php echo $row['nombre']; ?></h3>
            
            <div>
                <span class="contenido"><strong>Origen:</strong> <?php echo $row['origen']; ?> </span><br><br>
                
                <span class="contenido"><strong>Peso:</strong> <?php echo $row['peso']; ?>g</span><br><br>
                <?php 
                if($row['oferta'] == 1){
                ?>
                    
                    <span class="contenido"><strong>Precio: </strong><span class="precio_tachado">$<?php echo $row['precio']; ?></span></span><br><br>
                    <span class="contenido"><strong>oferta: </strong>$<?php echo $row['precio_oferta']; ?></span><br><br>
                <?php
                } else {
                ?>
                    <span class="contenido"><strong>Precio: </strong>$<?php echo $row['precio']; ?></span><br><br>
                <?php
                }
                ?>
                <span class="contenido"><strong>Categoria:</strong> 
                    <?php
                    $id2 = $row['categorias'];
                        $query2 = "SELECT * FROM categorias WHERE id='$id2'";
                        $resultado2 = $conexion->query($query2);
                        $row2 = $resultado2->fetch_assoc();

                        echo $row2['nombre'];
                    ?>
                    </span><br><br><br>
                <p class="contenido"><strong>Descripción:</strong> <?php echo $row['descripcion']; ?> </p>
            </div>
        </div>
        <div class="redes_sociales_ver_producto">
                
        </div>
    </div>




<script>
    const imagen = document.getElementById('imagen_producto')

    function resizeImage(){
        const ancho = imagen.offsetWidth;
        imagen.style.height = `${ancho}px`;
    }
    document.addEventListener('DOMContentLoaded', function() {
        resizeImage();        
    });

    window.addEventListener('resize', () => {
        resizeImage();
    })
</script>
</body>
</html>