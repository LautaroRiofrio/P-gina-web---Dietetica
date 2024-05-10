<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <nav>
        <ul>
            <img src="../img/logo.png" alt="" class="logo">
            
            
            <li><a href="../" class="ultimo" >Tienda</a></li>
            <li><a href="index.php">Inicio</a></li>

        </ul>
    </nav>
    <div class="contenedor">
        <table>
            <thead>
                <tr>
                    <td>Nombre</td>
                    <td class="limit_width">Descripción</td>
                    
                    <td colspan="2">Operaciones</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include('../conexion/conexion.php');

                    $query = "SELECT * FROM categorias";
                    $resultado = $conexion->query($query);

                    while($row = $resultado -> fetch_assoc()){
                ?>
                <tr>
                    <td class="table_name" ><?php echo $row['nombre'] ?></td>
                    <td class="limit_width" ><?php echo $row['descripcion'] ?></td>
                    <td><a class="modificar"  href="modificar_categoria.php?id=<?php echo $row['id']; ?>">Modificar</a></td>
                    <td><a class="eliminar"  href="eliminar_categoria.php?id=<?php echo $row['id'] ?>">Eliminar</a></td>

                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>