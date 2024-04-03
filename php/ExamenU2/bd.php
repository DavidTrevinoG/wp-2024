<?php
    $servername = "localhost";
    $username = "admin";
    $password = "0ff42d8a24af5b106c0b0d5bfbda40dfb6d57e4f11434fa8";
    $dbname = "examenu2";

    $conn = new mysqli($servername,$username,$password,$dbname);

    if($conn->connect_error){
        die("Conexión fallida : ".$conn->connect_error);
    }

?>