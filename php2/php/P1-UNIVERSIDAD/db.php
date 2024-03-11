<?php

  //conexion a la base de datos

  $servername = "localhost";
  $username = "root";
  $password = "root";
  $dbname = "universidad2";

  // crear conexiom

  $conn = new mysqli ($servername, $username, $password, $dbname);

  // verificar la conexion

  if ($conn->connect_error){
    die("Conexión fallida: " . $conn->connect_error);
  }
  
  ?>