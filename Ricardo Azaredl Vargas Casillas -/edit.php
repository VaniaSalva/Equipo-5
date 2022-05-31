<?php
include("db.php");
$nombre = '';
$numero_empleado='';
$apellido1= '';
$apellido2='';
$departamento='';
$puesto='';
$estatus='';
$fecha_nacimiento='';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM informacion WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $numero_empleado = $row['numero_empleado'];
    $nombre = $row['nombre'];
    $apellido1 = $row['apellido1'];
    $apellido2 = $row['apellido2'];
    $departamento = $row['departamento'];
    $puesto = $row['puesto'];
    $estatus = $row['estatus'];
    $fecha_nacimiento = $row['fecha_nacimiento'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $numero_empleado = $_POST['numero_empleado'];
  $nombre = $_POST['nombre'];
  $apellido1 = $_POST['apellido1'];
  $apellido2 = $_POST['apellido2'];
  $departamento = $_POST['departamento'];
  $puesto = $_POST['puesto'];
  $estatus = $_POST['estatus'];
  $fecha_nacimiento = $_POST['fecha_nacimiento'];


  $query = "UPDATE informacion set numero_empleado = '$numero_empleado', nombre = '$nombre', apellido1 = '$apellido1', apellido2 = '$apellido2', 
                                   departamento = '$departamento', puesto = '$puesto', estatus = '$estatus', 
                                   fecha_nacimiento = '$fecha_nacimiento' 
                                   WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Informacion actualizada correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>

<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">

          <label for="numero_empleado">Numero de empleado</label>
          <input  type="text" name="numero_empleado" class="form-control" value="<?php echo $numero_empleado; ?>" ></input>

          <label for="nombre">Nombre</label>
          <input  type="text" name="nombre" class="form-control" value="<?php echo $nombre; ?>" ></input>

          <label for="apellido1">Apellido paterno</label>
          <input  type="text" name="apellido1" class="form-control" value="<?php echo $apellido1; ?>" ></input>

          <label for="apellido2">Apellido materno </label>
          <input type="text" name="apellido2" class="form-control" value="<?php echo $apellido2; ?>" ></input>

          <label for="departamento">Departamento</label>
          <input type="text" name="departamento" class="form-control" value="<?php echo $departamento; ?>" ></input>

          <label for="puesto">Puesto</label>
          <input type="text" name="puesto" class="form-control" value="<?php echo $puesto; ?>"></input>
            
          <label for="estatus">Estatus</label>
          <input type="text" name="estatus" class="form-control" value="<?php echo $estatus; ?>"></input>

          <label for="fecha_nacimiento">Fecha de nacimiento</label>
          <input type="date" name="fecha_nacimiento" step="1" class="form-control" value="<?php echo $fecha_nacimiento; ?>" ></input>  
        </div>
        <button type="submit" class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>