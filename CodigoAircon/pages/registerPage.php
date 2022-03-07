<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://drive.google.com/uc?id=1VOhsU-9rzNeTUiiOLaCCf9GIX1Hvge7B" type="image/x-icon">
    <link rel="stylesheet" href="../styles/registerLogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css"/>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>
    <title>Registrate | Aircon</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['alert'])){
            $myError = $_SESSION['alert'];
            session_destroy();
        }
        else{
            $myError = "";
        }
    ?>
    <main class="container">
        <img src="https://drive.google.com/uc?id=141ILhH9N3xMNjuAF99kE5zmWdIWCKrGc" alt="aircon-logo-mobile" class="logo-mobile">
        <img src="https://drive.google.com/uc?id=1lhOMQhpKRsGt7GNtbPBS9iV1bNS9T5Hs" alt="aircon-logo-desktop" class="logo-desktop">
        <h2 class="title">Regístrate</h2>
        <form action="../assets/php/register.php" method="post">
            <input type="text" placeholder="Nombre" name="name" required>
            <input type="text" placeholder="Apellido" name="lastname" required>
            <input type="email" placeholder="Correo electrónico" name="email" required>
            <input type="password" placeholder="Contraseña" name="password" required>
            <input type="password" placeholder="Confirmar Contraseña" name="confirmPassword" required>
            <input type="text" placeholder="País" name="country" required>
            <input type="tel" placeholder="Celular" name="phone" id='phone' required>
            <div class="birth-gender">
                <input type="date" placeholder="Fecha de nacimiento" name="birth" required>
                <select name="gender" id="gender" required name="gender">
                        <option value="" disabled selected hidden>Género</option>
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                        <option value="O">Otro</option>
                </select>
            </div>
            <p class="error"><?php echo $myError;?></p>
            <input type="submit" value="Registrarse" class="primary-button" onclick="getPhone()">
        </form>
        <p>Ya tienes una cuenta? <a href="./loginPage.php">Ingresa!</a></p>
    </main>
</body>
<script src="../assests/scripts/telInput.js"></script>
</html>