<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Califiquenos</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="shortcut icon" href="https://drive.google.com/uc?id=1VOhsU-9rzNeTUiiOLaCCf9GIX1Hvge7B" type="image/x-icon">
    <script src="https://kit.fontawesome.com/be539b68f8.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../styles/cali.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <script src="https://kit.fontawesome.com/e9d8cd8412.js" crossorigin="anonymous"></script>

</head>

<body>

    <div class="col-12 ">
        <div class="card">
            <div class="card-header">
                <a href="../../index.html" ><img src="../../datosAircon/logo-horizontal.png" alt="aircon-logo-desktop" class="logo-desktop"></a>
                <div>
                    <h1 class="titu">Calificanos</h1>
                </div>
            </div>
            <div class="card-body">
                <form id="formulario1" action="../assests/php/AdCali.php" method="POST" name="Formulario1">

                    <div class="form-control">
                        <label for="correo">Correo</label><br>
                        <input type="email" name="correo" id="correo" placeholder="Email">


                        <br><span id="availabilty"></span>
                    </div>

                    <div id="vuel" class="form-control">
                        <label for="vuelo">ID del vuelo</label><br>
                        <input type="text" name="vuelo" id="vuelo" disabled placeholder="Ej. 123v45">
                        <br><span id="availabilty2"></span>
                    </div>

                    <div  id="cal" class="form-control">
                        <label for="califi">Calificación</label><br>
                        <div class="star-widget">

                            <samp class="fa fa-star" onclick="calificar(this)" style="cursor: pointer;"
                                id="1estrella"></samp>

                            <samp class="fa fa-star" onclick="calificar(this)" style="cursor: pointer;"
                                id="2estrella"></samp>

                            <samp class="fa fa-star" onclick="calificar(this)" style="cursor: pointer;"
                                id="3estrella"></samp>

                            <samp class="fa fa-star" onclick="calificar(this)" style="cursor: pointer;"
                                id="4estrella"></samp>

                            <samp class="fa fa-star" onclick="calificar(this)" style="cursor: pointer;"
                                id="5estrella"></samp>
                            <input  type="hidden" value="0" name="califi" id="califi" form="formulario1">
                        </div>

                    </div> <br>
                    <button type="submit" name="calificar" class="btn btn-primary" id="enviar"  disabled>Calificar</button>
                    <a href="../../index.html" class="btn btn-danger">Volver</a>
                </form>
            </div>
        </div>
    </div>


    <div class="content-text">

    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#correo').mouseover(cor);
        $('#correo').keyup(cor);
        $('#vuelo').keyup(vul);
    })
    function cor() {

        var correo = $(this).val();
        if (correo == "") {
            $('#availabilty').html('<span class="text-danger"> <i class="fas fa-exclamation-circle"></i> El correo no puede estar vacio </span>');
            $('#vuelo').attr('disabled', true)
        } else if ($("#correo").val().indexOf('@', 0) == -1 || $("#correo").val().indexOf('.', 0) == -1) {
            $('#availabilty').html('<span class="text-danger"> <i class="fas fa-exclamation-circle"></i> El correo no es valido </span>');
            $('#vuelo').attr('disabled', true)

       } /*else {
            $('#availabilty').html('<span class="text-success"><i class="fas fa-check-circle"></i> El correo no es valido </span>');
            $('#vuelo').attr('disabled', false)
        }  */else {
            $.ajax({
                url: '../assests/php/CaliVerif.php',
                method: "POST",
                data: { mail : correo },
                success: function (result) {
                    console.log(result) 
                    if (result == 0) {
                        $('#availabilty').html('<span class="text-danger"> El correo no existe </span>');
                        $('#vuelo').attr('disabled', true)

                    }
                    else {
                        $('#availabilty').html('<span class="text-success"> El correo Está correcto </span>');
                        $('#vuelo').attr('disabled', false)
                    }
                }
            })
        }
    }
    function vul() {
        var vuelo = $(this).val();
        if (vuelo == "") {
            $('#availabilty2').html('<span class="text-danger"> <i class="fas fa-exclamation-circle"></i> El ID de vuelo no puede estar vacio </span>');
            $('#enviar').attr('disabled', true)
        } else {
            $('#availabilty2').html('<span class="text-success"><i class="fas fa-check-circle"></i> El ID de vuelo es valido </span>');
            $('#enviar').attr('disabled', false)
        }
    }
</script>

<script src="../assests/scripts/cali.js"></script>
 
</body>

</html>