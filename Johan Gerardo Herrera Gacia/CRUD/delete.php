<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create.css">
    <title>Confirmar eliminacion</title>
</head>
<body>
<?php 
    include_once('./crud.php');
    dbConnect($dbSettings);
    if(!isset($_GET['id'])){
        header('Location: ./read.php');
    }
    $empleado = readId($_GET['id']);
    ?>
    <a href="./">Volver</a>
    <div class="contenedor">
        <form action="processor.php?delete&id=<?= $_GET['id'] ?>" class="hijo" method="POST">

        <label for="empleado">Numero de empleado</label>
        <input type="number" name="empleado" id="empleado" min="0" required value="<?= $empleado[1] ?>" disabled>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required value="<?= $empleado[2] ?>" disabled>

        <label for="apellidop">Apellido Paterno</label>
        <input type="text" name="apellidop" id="apellidop" required value="<?= $empleado[3] ?>" disabled>

        <label for="apellidom">Apellido Materno</label>
        <input type="text" name="apellidom" id="apellidom" required value="<?= $empleado[4] ?>" disabled>

        <label for="departamento">Departamento</label>
        <input type="text" name="departamento" id="departamento" required value="<?= $empleado[5] ?>" disabled>

        <label for="puesto">Puesto</label>
        <input type="text" name="puesto" id="puesto" required value="<?= $empleado[6] ?>" disabled>

        <?php 
        if($empleado[7]=="Activo"){
        ?>
        <label for="estado">Estatus</label>
        <select name="estado" id="estado" required disabled>
            <option value="1" selected>Activo</option>
            <option value="2">Inactivo</option>
        </select>
        <?php 
        }else{
        ?>
        <label for="estado">Estatus</label>
        <select name="estado" id="estado" required disabled>
            <option value="1">Activo</option>
            <option value="2" selected>Inactivo</option>
        </select>
        <?php 
        }
        ?>
        <br>
        <label for="nacimiento">Fecha de nacimiento</label>
        <input type="date" name="nacimiento" id="nacimineto" required value="<?= $empleado[8] ?>" disabled>

        <input type="submit" value="Eliminar empleado" class="boton">
    </form>
</div>
</body>
</html>