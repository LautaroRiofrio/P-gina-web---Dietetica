<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <center>
        <table border="2">
            <thead>
                <tr>
                    <th colspan="6"> <a href="index.php">Nuevo</a> </th>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Imagen</th>
                    <th colspan="2">Operaciones</th>
                </tr>
            </thead>
            <tbody>
            <?php
                include("conexion.php");

                $query = "SELECT * FROM categorias";
                $resultado = $conexion->query($query);
                
                while($row = $resultado->fetch_assoc()){

            ?>
                <tr>
                    <td> <?php echo $row['id'];  ?>  </td>
                    <td> <?php echo $row['nombre'];  ?>  </td>
                    <td> <?php echo $row['descripcion'];  ?>  </td>
                    <td> <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" />  </td>
                    <td>  <a href="modificar.php?id=<?php echo $row['id']; ?>">Modificar</a> </td>
                    <td>  <a href="eliminar.php?id=<?php echo $row['id']; ?>">Eliminar</a> </td>
                </tr>
            <?php
                }
            ?>
                
            
            </tbody>
        </table>
    </center>
</body>
</html>