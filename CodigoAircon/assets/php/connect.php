<?php
    $serverName = 'localhost';
    $userName = 'root';
    $password = '';    
    $dbName = 'aircon';

    $conn = mysqli_connect($serverName,$userName,$password);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "CREATE DATABASE IF NOT EXISTS $dbName";
    if (!mysqli_query($conn,$sql)){
        echo "Error creating database: " . mysqli_error($conn);
    }
    $conn = mysqli_connect($serverName,$userName,$password, $dbName);
?>