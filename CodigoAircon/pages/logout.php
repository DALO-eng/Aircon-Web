<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="https://drive.google.com/uc?id=1VOhsU-9rzNeTUiiOLaCCf9GIX1Hvge7B" type="image/x-icon">
    <link rel="stylesheet" href="../styles/registerLogin.css">
    <title>Cerrar Sesión | Aircon</title>
</head>
<body>
    <?php
        session_start();
        unset($_SESSION);
        session_destroy();
    ?>
    <main class="container">
        <img src="https://drive.google.com/uc?id=141ILhH9N3xMNjuAF99kE5zmWdIWCKrGc" alt="aircon-logo-mobile" class="logo-mobile">
        <img src="https://drive.google.com/uc?id=1lhOMQhpKRsGt7GNtbPBS9iV1bNS9T5Hs" alt="aircon-logo-desktop" class="logo-desktop">
        <h2 class="title">Sesión Cerrada</h2>
        <p>La sesión se cerró debido a que usted decidió hacerlo o tuvo un tiempo de inactividad mayor de 15 minutos!</p>
        <a href="../../index.php" class="logout-button">Entiendo!</a>
    </main>
</body>
</html>