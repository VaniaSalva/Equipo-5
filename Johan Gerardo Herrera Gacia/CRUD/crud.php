<?php 
$dbSettings = file_get_contents("config.json");
$dbSettings = json_decode($dbSettings, true);
$conn;

function dbConnect($database){
    $GLOBALS['conn'] = mysqli_connect($database["server"], $database["user"], $database["password"], $database["db"]);
    if (!$GLOBALS['conn']) {
        die("Connection failed: " . mysqli_connect_error());
    }
}

function create($nempleado, $nombre, $apellidop, $apellidom,$depto, $puesto,$estatus,$nacimiento ){
    $sql = "INSERT INTO `empleados`(
        No_Empleado,
        Nombre,
        P_Apellido,
        S_Apellido,
        Departamento,
        Puesto,
        Estatus,
        Nacimiento
    )
    VALUES(
        '$nempleado',
        '$nombre',
        '$apellidop',
        '$apellidom',
        '$depto',
        '$puesto',
        '$estatus',
        '$nacimiento'
    )";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "se insertó el dato";
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}

function readAll(){
    $sql = "SELECT * FROM empleados";
    $row = "No data";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_All();
        return $row;
      } else {
        return $row;
      }
}

function update($id, $nempleado, $nombre, $apellidop, $apellidom,$depto, $puesto,$estatus,$nacimiento ){
    $sql = "UPDATE
        empleados
    SET
        No_Empleado = '$nempleado',
        Nombre = '$nombre',
        P_Apellido = '$apellidop',
        S_Apellido = '$apellidom',
        Departamento = '$depto',
        Puesto = '$puesto',
        Estatus = '$estatus',
        Nacimiento = '$nacimiento'
    WHERE
        Id = '$id'";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "se actualizó el dato";
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}

function delete($id){

    $sql = "DELETE FROM empleados WHERE Id='$id'";

    if ($GLOBALS['conn']->query($sql) === TRUE) {
        echo "se eliminó la fila";
    } else {
        echo "Error: " . $sql . "<br>" . $GLOBALS['conn']->error;
    }
}
function dbDisconnect(){
    mysqli_close($GLOBALS['conn']);
}


function readId($id){
    $sql = "SELECT * FROM empleados WHERE Id = '$id'";
    $row = "No data";
    $result = $GLOBALS['conn']->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_All();
        return $row[0];
      } else {
        return $row;
      }
}
?>