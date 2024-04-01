<?php
    //Conexión a base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "proyectou2";

    //Crear la conexión a la base de datos
    $conn = new mysqli($servername,$username,$password,$dbname);

    //Verificar la conexión 
    if($conn->connect_error){
        die("Conexión fallida : ".$conn->connect_error);
    }

?>