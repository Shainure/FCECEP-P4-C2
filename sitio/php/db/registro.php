<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ciudsanos";

$nombre = $_REQUEST["name"];
$pwd  = $_REQUEST["paswd"];
$cedula = $_REQUEST["cedula"];
$telefono = $_REQUEST["telefono"];
$genero = $_REQUEST["genero"];
$nacimiento = $_REQUEST["nacimiento"];


$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);

$sql = "INSERT INTO medicos VALUES (null, '" . $nombre . "', '" . $pwd . "', '" . $cedula . "', '"
    . $telefono . "', '" . $genero . "', '" . $nacimiento . "' );";

if ($conexion->query($sql)
    or die(mysqli_errno($conexion) . " : "
        . mysqli_error($conexion) . " | Query=" . $sql) === TRUE) {

    header('Location: ../../index.php?msg=1');
} else {
    header('Location: ../../index.php?msg=2');
}
exit();

$conexion->close();

?>