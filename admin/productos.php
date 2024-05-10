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
                    <td>Categoria</td>
                    <td>Origen</td>
                    <td>Peso</td>
                    <td>Stock</td>
                    <td>Precio</td>
                    <td>Oferta</td>
                    <td>Precio oferta</td>
                    
                    <td colspan="2">Operaciones</td>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include('../conexion/conexion.php');

                    $query = "SELECT * FROM productos";
                    $resultado = $conexion->query($query);

                    while($row = $resultado -> fetch_assoc()){
                ?>
                <tr>
                    <td><?php echo $row['nombre'] ?></td>
                    <td><?php $id=$row['categorias']; $query2="SELECT * FROM categorias WHERE id='$id'"; $resultado2=$conexion->query($query2); $row2=$resultado2 -> fetch_assoc(); echo $row2['nombre']; ?></td>
                    <td><?php echo $row['origen'] ?></td>
                    <td><?php echo $row['peso'] ?></td>
                    <td><?php echo $row['stock'] ?></td>
                    <td><?php echo $row['precio'] ?></td>
                    <td><?php echo $row['oferta'] ?></td>
                    <td><?php echo $row['precio_oferta'] ?></td>
                    <td><a class="modificar" href="modificar_producto.php?id=<?php echo $row['id'] ?>">Modificar</a></td>
                    <td><a class="eliminar" href="eliminar_producto.php?id=<?php echo $row['id'] ?>">Eliminar</a></td>

                </tr>
                <?php 
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>