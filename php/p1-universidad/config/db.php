<?php

// Conexión a la base de datos
$server_name = "localhost";
$user_name = "admin";
$password = "0ff42d8a24af5b106c0b0d5bfbda40dfb6d57e4f11434fa8";
$dbname = "universidad";

// Crear conexión
$conn = new mysqli($server_name, $user_name, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

?>