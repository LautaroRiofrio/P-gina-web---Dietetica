<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<style>
        /* form {
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
        } */

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
    <h1 class="h1_seccion">Agregar Producto</h1>
    <div class="contenedor">
        <form action="guardar_producto.php" method="POST" enctype="multipart/form-data">
            <br><br>

            <label for="nombre">Nombre del producto</label>
            <input type="text" name="nombre" REQUIRED placeholder="Nombre..."><br><br>

            <label for="descripcion">Descripcion del producto</label>
            <input type="text" REQUIRED name="descripcion" placeholder="Descripcion..."><br><br>

            <label for="imagen">Imagen del producto</label>
            <input id="inputImagen" REQUIRED type="file" name="imagen">
            <img id="imagenSeleccionada"  src="#" alt="Imagen seleccionada" style="display: none; max-width: 100%;"><br><br>

            <label for="stock">Cantidad en stock</label>
            <input type="number" REQUIRED name="stock" placeholder="Stock..."><br><br>

            <label for="peso">Peso</label>
            <input type="number" REQUIRED name="peso" placeholder="Peso..."><br><br>

            <label for="origen">Origen</label>
            <input type="text" REQUIRED name="origen" placeholder="Origen..."><br><br>

            <label for="precio">Precio</label>
            <input type="number" REQUIRED name="precio" placeholder="Precio..."><br><br>

            <label for="oferta">¿Esta en oferta?</label>
            <input type="checkbox" REQUIRED name="oferta" value="true"> Esta en oferta<br><br>
            <!-- <input type="hidden" name="oferta" value="false"> -->
            <input type="number" REQUIRED name="precio_oferta" placeholder="Precio oferta..."><br><br>
            <label for="categoria">Categoria</label>
            <select name="categorias[]" REQUIRED id="categoria">
                <?php 
                include('../conexion/conexion.php');
                $query = "SELECT * FROM categorias";
                $resultado = $conexion->query($query);

                while($row = $resultado -> fetch_assoc()){
                ?>

                <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre'] ?></option>

                <?php
                }
                ?>
            </select><br><br>
            <input type="submit" value="Guardar">
        </form>
    </div>
    <script>
        // Seleccionar el elemento de entrada de archivo
        const inputImagen = document.getElementById('inputImagen');
        // Seleccionar la etiqueta de imagen
        const imagenSeleccionada = document.getElementById('imagenSeleccionada');

        // Agregar un event listener para el cambio en el input de archivo
        inputImagen.addEventListener('change', function() {
            // Verificar si se seleccionó algún archivo
            if (this.files && this.files[0]) {
            // Crear un objeto de tipo FileReader
            const reader = new FileReader();

            // Cuando el archivo se cargue, establecer el src de la imagen
            reader.onload = function(e) {
                imagenSeleccionada.src = e.target.result;
                // Mostrar la imagen
                imagenSeleccionada.style.display = 'block';
            }

            // Leer el contenido del archivo como una URL de datos
            reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
</body>
</html>