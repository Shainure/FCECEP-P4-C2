<?php
#incluye el archivo que contiene la clase
include_once("db/login.php");


function phpAlert($msg)
{
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

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
            localStorage.setItem("usuario", " '.$newLogin->getUserName() .' ");
        </script>'
    ;


    if ($newLogin->getIngreso() == 0) {
        header('Location: ../index.php?msg=0');
        exit();
    }
}


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
                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#paciente">Registrar paciente</button>

                <button type="button" id="cons" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#consulta">Registrar consulta médica</button>

                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#paciente">Mostrar consultas</button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="card">

            <div class="card-header">
                <span class="text-primary" id="headerInfo">Panel de control</span>

            <div class="card-body">


                <div class="d-grid gap-2 col-6 mx-auto">

                    <button type="button" id="sign" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#registro">Registro (nuevo médico)</button>
                </div>
            </div>
        </div>
    </div>



    <div id="formPaciente"></div>
    <div id="formConsulta"></div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>

    <script>
        $('#formPaciente').load('../forms.html #paciente');
        $('#formConsulta').load('../forms.html #consulta');
        
        document.getElementById("headerInfo").innerHTML = "Panel de control - " + localStorage.getItem("usuario");
    </script>


    <script>
        $(document).ready(function() {
            $('#cons').click(function() {
                var today = new Date();
                var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                document.getElementById("fechConsulta").value = date;
                document.getElementById("medico").value = localStorage.getItem("usuario");
            });
        });
    </script>
    
</body>

</html>