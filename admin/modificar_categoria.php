<?php 
    include('../conexion/conexion.php');
    $id = $_REQUEST['id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<style>
        form {
            margin: 0;
            width: 80%;
            margin-left: 10%;
            
        }
        label {
            display: block;
            margin-bottom: 5px;
            text-align: left;
        }
        input[type="text"],
        input[type="number"],
        input[type="file"],
        input[type="checkbox"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="file"] {
            cursor: pointer;
        }
        input[type="checkbox"] {
            width: auto;
            margin-bottom: 0;
        }
    </style>
    <link rel="stylesheet" href="../assets/style.css">
<body>  
    <nav>
        <ul>
            <img src="../img/logo.png" alt="" class="logo">
            
            
            <li><a href="../" class="ultimo" >Tienda</a></li>
            <li><a href="index.php">Inicio</a></li>

        </ul>
    </nav>
    <div class="contenedor">
        <h1>Agregar Categoria</h1>
        <form action="proceso_modificar_categoria.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
            <br><br>            

            <?php 
            $query = "SELECT * FROM categorias WHERE id=$id";
            $resultado = $conexion->query($query);
            while($row = $resultado -> fetch_assoc()){
            ?> 



            <label for="nombre">Nombre de la categoria</label>
            <input type="text" name="nombre" placeholder="Nombre..." value="<?php echo $row['nombre'] ?>"><br><br>

            <label for="descripcion">Descripcion de la Categoria</label>
            <input type="text" name="descripcion" placeholder="Descripcion..." value="<?php echo $row['descripcion'] ?>"><br><br>

            <label for="imagen">Imagen de la Categoria</label>
            <input id="inputImagen" type="file" name="nueva_imagen">
            <!-- <input  id="imagen_oculta"type="hidden" name="imagen_actual" value="<?php //echo $row['imagen']; ?>" style="display: none"> -->
           
            
            <img id="imagenSeleccionada"  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" alt="Imagen seleccionada" style=" max-width: 100%;"><br><br>

            <?php } ?>
            <input type="submit" value="Guardar">
        </form>
    </div>
    
    <script>
        const inputImagen = document.getElementById('inputImagen');
        const imagenSeleccionada = document.getElementById('imagenSeleccionada');

        inputImagen.addEventListener('change', function() {
            if (this.files && this.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                imagenSeleccionada.src = e.target.result;
                imagenSeleccionada.style.display = 'block';
            }

            reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
</body>
</html>