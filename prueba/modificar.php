<?php  require "conexion.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Via Saludable</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php
        include("conexion.php");
        $id = $_REQUEST['id'];
        $query = "SELECT * FROM categorias WHERE id=$id";
        $resultado = $conexion->query($query);
        $row = $resultado->fetch_assoc();
    ?>

    <center> <br><br><br>
       <form action="proceso_modificar.php?id=<?php echo $row['id'] ?>" method="POST" enctype="multipart/form-data">
            <input type="text" REQUIRED name="nombre" placeholder="Nombre..." value="<?php echo $row['nombre']?>"><br><br>
            <img src="data:image/jpg;base64,<?php echo base64_encode($row['imagen']); ?>" /> <br><br>
            <input type="file" REQUIRED name="imagen"><br><br>
            <input type="text" REQUIRED name="descripcion" placeholder="Descripcion..." value=" <?php echo $row['descripcion'] ?> "><br><br>           
            <input type="submit" value="Aceptar">
       </form> 
    </center>
</body>
</html>
