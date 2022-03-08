<?php
include('connect.php');
if(isset($_POST["mail"]))
{
    $correo=mysqli_real_escape_string($conn, $_POST["mail"]);
}

$sql= "SELECT * FROM user WHERE email ='$correo'";
$result = mysqli_query($conn, $sql);
$result = mysqli_num_rows($result);
Echo $result;

?>