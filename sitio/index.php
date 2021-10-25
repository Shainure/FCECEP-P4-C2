<?php
$msg = isset($_GET['msg']) ? $_GET['msg'] : 3;
//echo $msg;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Parcial 2</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <script type="text/JavaScript">localStorage.clear();</script>
</head>

<body>
    <div class="container">
        <div class="jumbotron">
            <h1>Parcial 2</h1>
            <hr class="my-4">
            <h4>Martinez Duque Luis</h4>
            <h4>Salamanca Lozano Dilan</h4>
            <hr class="my-4">
            <p>
                El Centro de Salud “Ciudadanos Sanos” necesita adelantar el desarrollo de un aplicativo web utilizando
                el lenguaje de programación php y opcionalmente aplicar la técnica Ajax.
            </p>
            <p>
                El Aplicativo deberá permitir:
            <ol>
                <li>Registrar los pacientes que se atienden en el Centro de Salud.</li>
                <li>Registrar la atención médica que realiza un médico a un paciente.</li>
                <li>Mostrar en el browser, una tabla con la información de todaslas consultas realizadas (Fecha, nombre
                    de médico, nombre de paciente.</li>
            </ol>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="card">

            <div class="card-header">
                <span class="text-primary">¡Bienvenido a <span style="font-weight: bold;">Ciudadanos Sanos</span>!</span>
            </div>

            <div class="card-body">
                <span  id="error" style="display: none;"> 
                    <div class="card text-white bg-info mb-3" id="cardInfo">
                        <div class="card-header" id="textInfo">Cédula o contraseña incorrecta</div>
                    </div>
                </span>

                <div class="d-grid gap-2 col-6 mx-auto">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#login">Iniciar
                        sesión</button>
                    <button type="button" id="sign" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#registro">Registro (nuevo médico)</button>
                </div>
            </div>
        </div>
    </div>



    <div id="formLogin"></div>
    <div id="formRegistro"></div>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>


    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.js"></script>

    <script>
        $('#formLogin').load('forms.html #login');
        $('#formRegistro').load('forms.html #registro');
    </script>


    <script>
        $(document).ready(function(){
            $('#sign').click(function(){
                var today = new Date();
                var date = (today.getFullYear()-18) + '-' + (today.getMonth() + 1) + '-' + today.getDate();
                document.getElementById("nacimiento").max = date;
            });
        });
    </script>

    
    <script>
        document.getElementById("error").style.display = "inline";
        if ('<?php echo $msg ?>' == 0) {        //error de login            
            document.getElementById("cardInfo").className = "card text-white bg-danger mb-3";
        }else if('<?php echo $msg ?>' == 1){    //Registro exitoso     
            document.getElementById("cardInfo").className = "card text-white bg-success mb-3";
            document.getElementById("textInfo").innerHTML = "¡Registro exitoso!";
        }else if('<?php echo $msg ?>' == 2){    //Registro exitoso         
            document.getElementById("cardInfo").className = "card text-white bg-danger mb-3";
            document.getElementById("textInfo").innerHTML = "Hubo un error al registrarse...";
        }else{
            document.getElementById("error").style.display = "none";            
        }         
    </script>
</body>

</html>