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
        h1 {
            text-align: center;
        }
    </style>
<body>  
    <nav>
        <ul>
            <img src="../img/logo.png" alt="" class="logo">
            
            
            <li><a href="../" class="ultimo" >Tienda</a></li>
            <li><a href="index.php">Inicio</a></li>

        </ul>
    </nav>
    <h1 class="h1_seccion">Agregar Categoría</h1>
    <div class="contenedor">
        <form action="guardar_categoria.php" method="POST" enctype="multipart/form-data">
            <br><br>
            <input type="text" REQUIRED name="nombre" placeholder="Nombre..."><br><br>
            <input type="text" REQUIRED name="descripcion" placeholder="Descripcion..."><br><br>
            <input type="file" REQUIRED name="imagen"><br><br>
            <input type="submit" value="Guardar">
        </form>
    </div>
</body>
</html>