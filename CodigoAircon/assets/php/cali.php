<?php
$connect = mysqli_connect("localhost","root", "", "aircon");
if(!$connect)
die ("<h3>***ERROR al conectar...");
    
if(isset($_POST["mail"]))
{
    $correo=mysqli_real_escape_string($connect, $_POST["mail"]);
}

$sql= "SELECT * FROM user WHERE email ='$correo'";
$result = mysqli_query($connect, $sql);
$result = mysqli_num_rows($result);
Echo $result;

?>