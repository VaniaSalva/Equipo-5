<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="create.css">
    <title>Añadir empleado</title>
</head>
<body>
    <a href="./">Volver</a>
    <div class="contenedor">
        <form action="processor.php?create" class="hijo" method="POST">

        <label for="empleado">Numero de empleado</label>
        <input type="number" name="empleado" id="empleado" min="0" required>

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>

        <label for="apellidop">Apellido Paterno</label>
        <input type="text" name="apellidop" id="apellidop" required>

        <label for="apellidom">Apellido Materno</label>
        <input type="text" name="apellidom" id="apellidom" required>

        <label for="departamento">Departamento</label>
        <input type="text" name="departamento" id="departamento" required>

        <label for="puesto">Puesto</label>
        <input type="text" name="puesto" id="puesto" required>

        <label for="estado">Estatus</label>
        <select name="estado" id="estado" required>
            <option value="0" selected>Selecciona Estatus</option>
            <option value="1">Activo</option>
            <option value="2">Inactivo</option>
        </select>
        <br>
        <label for="nacimiento">Fecha de nacimiento</label>
        <input type="date" name="nacimiento" id="nacimineto" required>

        <input type="submit" value="Añadir empleado" class="boton">
    </form>
</div>
</body>
</html>

