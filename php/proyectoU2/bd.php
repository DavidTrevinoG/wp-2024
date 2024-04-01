<?php
    //Conexión a base de datos
    $servername = "localhost";
    $username = "admin";
    $password = "0ff42d8a24af5b106c0b0d5bfbda40dfb6d57e4f11434fa8";
    $dbname = "proyectou2";

    //Crear la conexión a la base de datos
    $conn = new mysqli($servername,$username,$password,$dbname);

    //Verificar la conexión 
    if($conn->connect_error){
        die("Conexión fallida : ".$conn->connect_error);
    }

?>