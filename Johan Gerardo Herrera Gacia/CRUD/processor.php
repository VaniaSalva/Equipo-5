<?php
include_once('./crud.php');
dbConnect($dbSettings);
if(isset($_GET['create'])){
   switch($_POST['estado']){
        case 1:
            $_POST['estado']='Activo';
            break;
        case 2:
            $_POST['estado']='Inactivo';
            break;
   }

   create($_POST['empleado'],$_POST['nombre'],$_POST['apellidop'],$_POST['apellidom'],$_POST['departamento'],$_POST['puesto'], $_POST['estado'],$_POST['nacimiento']);
   header('Location: ./read.php');
}
if(isset($_GET['update'])){
    switch($_POST['estado']){
         case 1:
             $_POST['estado']='Activo';
             break;
         case 2:
             $_POST['estado']='Inactivo';
             break;
    }
 
    update($_GET['id'],$_POST['empleado'],$_POST['nombre'],$_POST['apellidop'],$_POST['apellidom'],$_POST['departamento'],$_POST['puesto'], $_POST['estado'],$_POST['nacimiento']);
    header('Location: ./read.php'); 
}
if(isset($_GET['delete'])){
    delete($_GET['id']);
    header('Location: ./read.php'); 
}

dbDisconnect();
?>