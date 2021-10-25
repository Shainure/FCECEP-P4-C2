<?php
#incluye el archivo que contiene la clase
include_once("db/login.php");
include_once("db/cargarTabla.php");

$var = isset($_GET['var']) ? $_GET['var'] : false;

if ($var == false) {
    $loginID = $_POST["loginCC"];
    $loginPwd = $_POST["loginPwd"];

    # Crea un objeto de la clase

    $newLogin = new Login(
        $loginID,
        $loginPwd
    );

    $newLogin->login();

    echo '<script type="text/JavaScript"> 
            localStorage.setItem("usuario", " ' . $newLogin->getUserName() . ' ");
        </script>';

    if ($newLogin->getIngreso() == 0) {
        header('Location: ../index.php?msg=0');
        exit();
    }
}

$newLogin = new cargarDatos();

$newLogin->cargar();
$array = $newLogin->getListado();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Parcial 2</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <a href="../index.php" style="text-decoration: none; color: black;">
                <h1> Parcial 2</h1>
            </a>
            <hr class="my-4">
            <h4>Martinez Duque Luis</h4>
            <h4>Salamanca Lozano Dilan</h4>
            <hr class="my-4">
            <div class="col-sm-offset-4 col-sm-10">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#paciente">Registrar paciente</button>

                <button type="button" id="cons" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#consulta">Registrar consulta médica</button>
                
                <a href="../index.php">
                    <button type="button" class="btn btn-danger">Cerrar sesión</button>
                </a>
                 
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card ">

            <div class="card text-white bg-info">
                <div class="card-header">
                    <span id="headerInfo">Panel de control</span>
                </div>
            </div>

            <div class="card-body">
                <table id="tabla" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID Consulta</th>
                            <th>CC paciente</th>
                            <th>Nombre</th>
                            <th>Fecha</th>
                            <th>Detalles</th>
                            <th>Médico</th>
                            <th>Más</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($array as $fila) { ?>
                            <tr>
                                <td><?php echo utf8_encode($fila['idConsulta']) ?> </td>
                                <td><?php echo utf8_encode($fila['cedula']) ?> </td>
                                <td><?php echo utf8_encode($fila['nombre']) ?> </td>
                                <td><?php echo utf8_encode($fila['fechConsulta']) ?> </td>
                                <td><?php echo substr(utf8_encode($fila['detalles']), 0, 50) . "..." ?> </td>
                                <td><?php echo utf8_encode($fila['medico']) ?> </td>
                                <td>
                                    <div id="<?php echo $fila['idConsulta'] ?>">
                                        <button type="button" id="cargaInfo" class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#verInfo">Ver</button>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br><br><br>


    <div id="formPaciente"></div>
    <div id="formConsulta"></div>
    <div id="formDetalles"></div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>

    <script>
        $(document).ready(function() {
            $('#cons').click(function() {
                var today = new Date();
                var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                document.getElementById("fechConsulta").value = date;
                document.getElementById("medico").value = localStorage.getItem("usuario");
            });
            $("#tabla").DataTable();
        });
    </script>

    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <script>        //evento para ver más detalles botón

        $('#formPaciente').load('../forms.html #paciente');
        $('#formConsulta').load('../forms.html #consulta');
        $('#formDetalles').load('../forms.html #verInfo');

        document.getElementById("headerInfo").innerHTML = "Panel de control - " + localStorage.getItem("usuario");

        if (document.addEventListener) {
            document.addEventListener("click", handleClick, false);
        } else if (document.attachEvent) {
            document.attachEvent("onclick", handleClick);
        }

        function handleClick(event) {
            event = event || window.event;
            var element = event.target;

            if (element.id === "cargaInfo" && element.nodeName === "BUTTON") {
                verInformacion(--element.parentNode.id);
            }
        }
        
        function verInformacion(id) {
            datos = <?php echo json_encode($array);?> ;
            document.getElementById("verNombre").value = datos[id]["nombre"];
            document.getElementById("verID").value = datos[id]["idConsulta"];
            document.getElementById("verCedula").value = datos[id]["cedula"];
            document.getElementById("verFecha").value = datos[id]["fechConsulta"];
            document.getElementById("verDetalles").value = datos[id]["detalles"];
            document.getElementById("verMedico").value = datos[id]["medico"];  
        }
    </script>

</body>

</html>