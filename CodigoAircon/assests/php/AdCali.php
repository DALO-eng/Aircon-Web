<?php
include('connect.php');

echo '<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Califiquenos</title>

    <link rel="shortcut icon" href="https://drive.google.com/uc?id=1VOhsU-9rzNeTUiiOLaCCf9GIX1Hvge7B"
        type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="/CodigoAircon/styles/cali.css">

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">

    <script src="https://kit.fontawesome.com/e9d8cd8412.js" crossorigin="anonymous"></script>

</head>

<body>';
if(isset($_POST['calificar'])){
    $correo = $_POST['correo'];
    $vuelo = $_POST['vuelo'];
    $cali = $_POST['califi'];
    
    $sql = "CREATE TABLE IF NOT EXISTS califi(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        vuelo VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        calificacion int not null,
        fecha TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
        
    ) ENGINE = InnoDB";
    if(!mysqli_query($conn,$sql)){
        die(mysqli_error($conn));
    }

    $sqlIn= "INSERT INTO califi(vuelo,email,calificacion)
    VALUES ('$correo','$vuelo','$cali')";
    if(mysqli_query($conn,$sqlIn)){
        echo '<h3>Se ha Agregado su calificacion de '.$cali.' estrellas</h3>';
    }
    else{
        die(mysqli_error($conn));
    }
}
echo '</body>'
?>