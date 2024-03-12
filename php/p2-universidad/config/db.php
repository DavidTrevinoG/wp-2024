<?php

// Datos de la base de datos
$host = "localhost";
$user = "admin";
$pass = "0ff42d8a24af5b106c0b0d5bfbda40dfb6d57e4f11434fa8";
$db = "practica2";

// Conexión a la base de datos
$conn = new mysqli($host, $user, $pass, $db);

// Verificar la conexión
if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

?>