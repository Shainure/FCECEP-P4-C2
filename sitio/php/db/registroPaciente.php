<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ciudsanos";

$cedula = $_REQUEST["cedula"];
$nombre = $_REQUEST["nombre"];
$genero = $_REQUEST["genero"];

$direccion = $_REQUEST["direccion"];
$departamento = $_REQUEST["departamento"];
$ciudad = $_REQUEST["ciudad"];

$telefono = $_REQUEST["telefono"];
$email = $_REQUEST["email"];
$nacimiento = $_REQUEST["nacimiento"];

$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);

$sql = "INSERT INTO pacientes VALUES (null, '" . $cedula . "', '" . $nombre . "', '" . $genero . "', '" 
        . $direccion . "', '" . $departamento . "', '" . $ciudad . "', '" 
        . $telefono . "', '" . $email . "', '" . $nacimiento . "' );";


    echo $sql;

if ($conexion->query($sql) === TRUE) {
    $conexion->close();
    header('Location: ../inicio.php?msg=1&var=true');
} else {
    $conexion->close();
    header('Location: ../inicio.php?msg='. $conexion->error . "&var=true");
    //
}
exit();

?>