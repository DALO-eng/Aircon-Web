<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://drive.google.com/uc?id=1VOhsU-9rzNeTUiiOLaCCf9GIX1Hvge7B" type="image/x-icon">
    <link rel="stylesheet" href="../styles/registerLogin.css">
    <title>Ingresa | Aircon</title>
</head>
<body>
    <?php
        session_start();
        if(isset($_SESSION['user'])){
            if((time() - $_SESSION['time'] > 900)){
                header("Location: ./logout.php");
                exit;
            }
            else{
                $_SESSION['time'] = time();
                header("Location: ../../index.php");
            }
        }
        else{
            if(isset($_SESSION['alert'])){
                $myError = $_SESSION['alert'];
                session_destroy();
            }
            else{
                $myError = "";
            }
        }
    ?>
    <main class="container">
        <img src="https://drive.google.com/uc?id=141ILhH9N3xMNjuAF99kE5zmWdIWCKrGc" alt="aircon-logo-mobile" class="logo-mobile">
        <img src="https://drive.google.com/uc?id=1lhOMQhpKRsGt7GNtbPBS9iV1bNS9T5Hs" alt="aircon-logo-desktop" class="logo-desktop">
        <h2 class="title">Inicia Sesión</h2>
        <form action="../assets/php/login.php" method="post">
            <input type="email" placeholder="Correo electrónico" name="email" required>
            <input type="password" placeholder="Contraseña" name="password" required>
            <p class="error"><?php echo $myError;?></p>
            <input type="submit" value="Ingresar" class="primary-button">
        </form>
        <p>No tienes una cuenta? <a href="./registerPage.php">Registrate!</a></p>
    </main>
</body>
</html>