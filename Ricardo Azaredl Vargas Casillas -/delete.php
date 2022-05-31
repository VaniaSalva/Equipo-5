<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM informacion WHERE id = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("El query fallo.");
  }

  $_SESSION['message'] = 'Informacion eliminada con exito';
  $_SESSION['message_type'] = 'danger';
  header('Location: index.php');
}
