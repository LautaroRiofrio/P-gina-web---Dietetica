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
        <h1>Agregar Producto</h1>
        <form action="proceso_modificar_producto.php?id=<?php echo $id ?>" method="POST" enctype="multipart/form-data">
            <br><br>            

            <?php 
            $query = "SELECT * FROM productos WHERE id=$id";
            $resultado = $conexion->query($query);
            while($row = $resultado -> fetch_assoc()){
            ?> 



            <label for="nombre">Nombre del producto</label>
            <input type="text" name="nombre" placeholder="Nombre..." value="<?php echo $row['nombre'] ?>"><br><br>

            <label for="descripcion">Descripcion del producto</label>
            <input type="text" name="descripcion" placeholder="Descripcion..." value="<?php echo $row['descripcion'] ?>"><br><br>

            <label for="imagen">Imagen del producto</label>
            <input id="inputImagen" type="file" name="nueva_imagen">
            <!-- <input  id="imagen_oculta"type="hidden" name="imagen_actual" value="<?php //echo $row['imagen']; ?>" style="display: none"> -->
           
            
            <img id="imagenSeleccionada"  src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" alt="Imagen seleccionada" style=" max-width: 100%;"><br><br>

            <label for="stock">Cantidad en stock</label>
            <input type="number" name="stock" placeholder="Stock..." value="<?php echo $row['stock'] ?>"><br><br>

            <label for="peso">Peso</label>
            <input type="number" name="peso" placeholder="Peso..." value="<?php echo $row['peso'] ?>"><br><br>

            <label for="origen">Origen</label>
            <input type="text" name="origen" placeholder="Origen..." value="<?php echo $row['origen'] ?>"><br><br>

            <label for="precio">Precio</label>
            <input type="number" name="precio" placeholder="Precio..." value="<?php echo $row['precio'] ?>"><br><br>

            <label for="oferta">¿Esta en oferta?</label>
            <input type="checkbox" name="oferta" value="1" <?php echo ($row['oferta'] == 1) ? 'checked' : ''; ?>> Esta en oferta<br><br>
            <!-- <input type="hidden" name="oferta" value="false"> -->
            <input type="number" name="precio_oferta" placeholder="Precio oferta..." value="<?php echo $row['precio_oferta'] ?>"><br><br>

            <?php } ?>

            <label for="categoria">Categoria</label>
            <select name="categorias[]" id="categoria">
                <?php 
                $query2 = "SELECT * FROM categorias";
                $resultado2 = $conexion->query($query2);

                while($row2 = $resultado2 -> fetch_assoc()){
                ?>

                <option value="<?php echo $row2['id'] ?>"><?php echo $row2['nombre'] ?></option>

                <?php
                }
                ?>
            </select><br><br>
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