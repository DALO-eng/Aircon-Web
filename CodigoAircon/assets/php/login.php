<?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
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
        session_start();
        $_SESSION['userId'] = $myInfo;
        echo 'Bienvenido ' . $_SESSION['userId']['name'];
    }
    else{
        echo "Usuario / Contraseña incorrectas";
    }
?>