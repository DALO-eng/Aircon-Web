<?php
    include 'connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $country = $_POST['country'];
        $phone = $_POST['phone'];
        $birth = $_POST['birth'];
        $gender = $_POST['gender'];
    }

    $sql = "CREATE TABLE IF NOT EXISTS user(
        id INT(6) AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        lastname VARCHAR(30) NOT NULL,
        email VARCHAR(50) NOT NULL,
        password VARCHAR(20) NOT NULL,
        country VARCHAR(20) NOT NULL,
        phone VARCHAR(20) NOT NULL,
        birth DATE NOT NULL,
        gender VARCHAR(1) NOT NULL
    )";
    if(!mysqli_query($conn,$sql)){
        die(mysqli_error($conn));
    }
    $errorSintax = '';
    if(!preg_match("/^[a-zA-Z-' ]*$/",$name) || !preg_match("/^[a-zA-Z-' ]*$/",$lastname)){
        $errorSintax = "Solo se permiten letras y espacios en el nombre";
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
         $errorSintax = "Correo inválido";
    }
    elseif(strlen($password) < 8){
        $errorSintax = "Contraseña debe ser mayor a 8 caracteres";
    }
    elseif(!ctype_digit(substr($phone,1))){
        $errorSintax = "Solo se aceptan numeros en el telefono";
    }
    elseif(time() < strtotime('+18 years', strtotime($birth))){
        $errorSintax = "El usuario debe ser mayor de edad";
    }
    
    if($errorSintax === ''){
        $checkEmail = "SELECT * FROM user WHERE email = '$email'";
        $checkEmailQuery = mysqli_query($conn,$checkEmail);
        if(mysqli_num_rows($checkEmailQuery) > 0){
            echo "Este correo ya fue registrado :(";
        }
        else{
            if($password === $confirmPassword){
                $myPassword = $password;
                $cripto = array('sha256','md5','haval160,4');
                foreach($cripto as $value){
                    $myPassword = hash($value,$myPassword);
                }
                $myPassword = substr($myPassword, 0,20);
                $sqlInsert = "INSERT INTO user(name,lastname,email,password,country,phone,birth,gender)
                VALUES ('$name','$lastname','$email','$myPassword','$country','$phone','$birth','$gender')";
                if(mysqli_query($conn,$sqlInsert)){
                    echo 'Usuario ingresado';
                }
                else{
                    die(mysqli_error($conn));
                }
            }
            else{
                die("No coinciden las contraseñas");
            }
        }
    }
    else{
        die($errorSintax);
    }
?>