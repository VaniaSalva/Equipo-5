  
<?php

include('db.php');

if (isset($_POST['save'])) {
  $nombre = $_POST['nombre'];
  $numero_empleado = $_POST['numero_empleado'];
  $apellido1 = $_POST['apellido1'];
  $apellido2 = $_POST['apellido2'];
  $departamento = $_POST['departamento'];
  $puesto = $_POST['puesto'];
  $estatus = $_POST['estatus'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];

  $query = "INSERT INTO informacion(nombre, numero_empleado, apellido1, apellido2, departamento, puesto, estatus, fecha_nacimiento) 
                   VALUES ('$nombre', '$numero_empleado', '$apellido1', '$apellido2', '$departamento', '$puesto', '$estatus','$fecha_nacimiento')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Error.");
  }

  $_SESSION['message'] = 'Informacion guardada correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

} 

?>
