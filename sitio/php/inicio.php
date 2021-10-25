<?php
#incluye el archivo que contiene la clase
include_once("db/login.php");


function phpAlert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

$loginID = $_POST["loginCC"];
$loginPwd = $_POST["loginPwd"];

# Crea un objeto de la clase

$newLogin = new Login(
    $loginID,
    $loginPwd
);

#Calcula el indice
$newLogin->login();

echo "<br>".$newLogin->getUserName();
echo "<br>Entra?: ".$newLogin->getIngreso();


if ($newLogin->getIngreso() == 0) {
    //phpAlert(   "Error\\n\\nCédula y/o contraseña incorrecta."   );
    header('Location: ../index.php?msg=0');
    exit();
}


/*
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "ciudsanos";


$conexion = new mysqli($db_host, $db_user, $db_pass, $db_name);

$sql = "select nombre, cedula, password from medicos WHERE cedula=". $loginID ." && password='".$loginPwd."' ";

$resultado = $conexion->query($sql)
	or die(mysqli_errno($this->conexion) . " : "
		. mysqli_error($conexion) . " | Query=" . $sql);


$primerRegistro = $resultado->fetch_assoc();


print_r($primerRegistro);


if (mysqli_num_rows( $resultado ) ==0) {

    $conexion->close();
    //phpAlert(   "Error\\n\\nCédula y/o contraseña incorrecta."   );
    header('Location: ../index.php?error=true');
    exit();
}else{
    print_r($primerRegistro);
    $conexion->close();
}
*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <p>potato</p>
</body>
</html>