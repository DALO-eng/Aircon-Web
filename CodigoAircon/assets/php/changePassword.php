<?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $newPassword = $_POST['newpassword'];
        $newconfirmPassword = $_POST['newConfpassword'];
    }
    $errorSintax = '';
    if(strlen($newPassword) < 8){
        $errorSintax = "Contraseña debe ser mayor a 8 caracteres";
    }
    $myPassword = $password;
    $cripto = array('sha256','md5','haval160,4');
    foreach($cripto as $value){
        $myPassword = hash($value,$myPassword);
    }
    $myPassword = substr($myPassword, 0,20);

    $checkUser = "SELECT * FROM user WHERE email = '$email' AND  password = '$myPassword'";
    $userquery = mysqli_query($conn,$checkUser);
    $myInfo = mysqli_fetch_assoc($userquery);

    if(mysqli_num_rows($userquery) > 0){
        if($errorSintax === ''){
            if($newPassword === $newconfirmPassword){
                $myPassword = $newPassword;
                $cripto = array('sha256','md5','haval160,4');
                foreach($cripto as $value){
                    $myPassword = hash($value,$myPassword);
                }
                $myPassword = substr($myPassword, 0,20);
                $sqlUpdate = "UPDATE user SET password='$myPassword' WHERE email='$email'";
                if(mysqli_query($conn,$sqlUpdate)){
                    session_start();
                    $_SESSION['alert'] = 'El usuario fue registrado correctamente!';
                    header("Location: ../../pages/changePasswordPage.php");
                }
                else{
                    die(mysqli_error($conn));
                }
            }
        }
        else{
            session_start();
            $_SESSION['alert'] = $errorSintax;
            header("Location: ../../pages/changePasswordPage.php");
        }
    }
    else{
        session_start();
        $_SESSION['alert'] = "Usuario / Contraseña incorrectas!";
        header("Location: ../../pages/changePasswordPage.php");
    }
?>