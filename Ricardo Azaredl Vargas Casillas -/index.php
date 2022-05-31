<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MENSAJES -->
      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- Formulario de tarea -->
      <div class="card card-body">
        <form action="save.php" method="POST">
          <div class="form-group ">

            <label for="numero_empleado">Numero de empleado</label>
            <input type="text" name="numero_empleado" class="form-control" required="required"></input>
            
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required="required"></input> 

            <label for="apellido1">Apellido paterno</label>
            <input type="text" name="apellido1" class="form-control" required="required" ></input> 

            <label for="apellido2">Apellido materno</label>
            <input type="text" name="apellido2" class="form-control"required="required" ></input>

            <label for="departamento">Departamento</label>
            <input type="text" name="departamento" class="form-control" required="required" ></input>

            <label for="puesto">Puesto</label>
            <input type="text" name="puesto" class="form-control"></input>
            
            <label for="estatus">Estatus</label>
            <input type="text" name="estatus" class="form-control"></input>

            <label for="fecha_nacimiento">Fecha de nacimiento</label>
            <input type="date" name="fecha_nacimiento" step="1" class="form-control" required="required" ></input>

          </div>
          <input type="submit" name="save" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th># de empleado</th>
            <th>Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Departamento</th>
            <th>Puesto</th>
            <th>Estatus</th>
            <th>Fecha nacimiento</th>
            <th>Editar/Eliminar</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT *FROM informacion";          
          $result_informacion = mysqli_query($conn, $query);    
          while($row = mysqli_fetch_assoc($result_informacion)) { ?>
          <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['numero_empleado']; ?></td>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['apellido1']; ?></td>
            <td><?php echo $row['apellido2']; ?></td>
            <td><?php echo $row['departamento']; ?></td>
            <td><?php echo $row['puesto']; ?></td>  
            <td><?php echo $row['estatus']; ?></td>
            <td><?php echo $row ['fecha_nacimiento']; ?></td>
            <td>
              <a href="edit.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="delete.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>