<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
        <h1>Agregar Producto</h1>
        <form action="proceso_guardar.php" method="POST" enctype="multipart/form-data">
            <br><br>
            <input type="text" name="nombre" placeholder="Nombre..."><br><br>
            <input type="text" name="descripcion" placeholder="Descripcion..."><br><br>
            <input type="file" name="imagen"><br><br>
            <input type="number" name="stock" placeholder="Stock..."><br><br>
            <input type="number" name="peso" placeholder="Peso..."><br><br>
            <input type="text" name="origen" placeholder="Origen..."><br><br>
            <input type="number" name="precio" placeholder="Precio..."><br><br>
            <input type="checkbox" name="oferta" value="true"> Esta en oferta<br><br>
            <input type="number" name="precio_oferta" placeholder="Precio oferta..."><br><br>
            <label for="categoria">Categoria</label>
            <select name="categorias[]" id="categoria">
                <?php 
                include('conexion.php');
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
    </center>
</body>
</html>