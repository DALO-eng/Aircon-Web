<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://drive.google.com/uc?id=1VOhsU-9rzNeTUiiOLaCCf9GIX1Hvge7B" type="image/x-icon">
    <link rel="stylesheet" href="../styles/registerLogin.css">
    <title>Cambiar contraseña | Aircon</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['user'])){
            unset($_SESSION);
            session_destroy();
            session_start();
        }
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
        <h2 class="title">Cambia tu contraseña</h2>
        <form action="../assets/php/changePassword.php" method="post">
            <input type="email" placeholder="Correo electrónico" name="email" required>
            <input type="password" placeholder="Antigua contraseña" name="password" required>
            <input type="password" placeholder="Nueva contraseña" name="newpassword" required>
            <input type="password" placeholder="Confirma nueva contraseña" name="newConfpassword" required>
            <p class="error"><?php echo $myError;?></p>
            <input type="submit" value="Cambiar" class="primary-button">
        </form>
        <a href="../../index.php">Volver a Inicio</a>
    </main>
</body>
</html>