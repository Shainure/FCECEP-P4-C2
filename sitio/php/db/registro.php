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


/*echo "nombre: " . $nombre . "<br>";
echo $pwd  . "<br>";
echo $cedula . "<br>";

echo $telefono . "<br>";
echo $genero . "<br>";
echo $nacimiento . "<br>";*/

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