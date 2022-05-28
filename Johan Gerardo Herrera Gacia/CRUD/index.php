<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Lista de usuarios</title>
</head>
<body>
    <a href="create.php" class="boton">Añadir empleado</a>
   <table id="empleados">
       <tr>
           <th>ID</th>
           <th>Numero de empleado</th>
           <th>Nombre</th>
           <th>Apellido Paterno</th>
           <th>Apellido Materno</th>
           <th>Departamento</th>
           <th>Puesto</th>
           <th>Estatus</th>
           <th>Fecha de nacimiento</th>
           <th></th>
           <th></th>
       </tr>
       <?php
       include_once('./crud.php');
       dbConnect($dbSettings);
        $empleados = readAll();
        foreach ($empleados as $key => $value) {
       ?>
        <tr>
            <td><?= $value[0] ?></td>
            <td><?= $value[1] ?></td>
            <td><?= $value[2] ?></td>
            <td><?= $value[3] ?></td>
            <td><?= $value[4] ?></td>
            <td><?= $value[5] ?></td>
            <td><?= $value[6] ?></td>
            <td><?= $value[7] ?></td>
            <td><?= $value[8] ?></td>
            <td><a href="update.php?id=<?= $value[0] ?>" class="boton">Editar</a></td>
            <td><a href="delete.php?id=<?= $value[0] ?>" class="boton">Eliminar</a></td>
       </tr>
       <?php
       
        }
        dbDisconnect();
       ?>
   </table>
</body>
</html>