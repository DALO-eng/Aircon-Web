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

    if($password === $confirmPassword){
        $myPassword = password_hash($password,PASSWORD_DEFAULT);
        $myPassword = substr($myPassword, 0,30);
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
?>