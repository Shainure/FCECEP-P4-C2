<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ciudsanos";

$cedula = $_REQUEST["cedula"];
$fechConsulta = $_REQUEST["fechConsulta"];

$detalles = $_REQUEST["detalles"];
$medico = $_REQUEST["medico"];

$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);

$sql = "INSERT INTO consultas VALUES (null, '" . $cedula . "', '" . $fechConsulta . "', '"
        . $detalles . "', '" . $medico. "' );";


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