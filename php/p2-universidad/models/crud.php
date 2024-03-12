<?php

include '../config/db.php';

//Agregar vehículo
if(isset($_POST['alta_vehiculo'])){
    $num_serie = $_POST['num_serie'];
    $marca = $_POST['marca'];
    $submarca = $_POST['submarca'];
    $tipo = $_POST['tipo'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $capacidad = $_POST['capacidad'];
    $procedencia = $_POST['procedencia'];

    $query = "INSERT INTO vehiculos(num_serie, marca, submarca, tipo, modelo, color, capacidad, procedencia) VALUES ('$num_serie', '$marca', '$submarca', '$tipo', '$modelo', '$color', '$capacidad', '$procedencia')";
    $result = $conn->query($query);

    if(!$result){
        die("Query Failed");
    }

    header('Location: ../views/listado_vehiculos.php');
}

//Eliminar un vehículo
if(isset($_GET['eliminar_id_vehiculo'])){
    $id_vehiculo = $_GET['eliminar_id_vehiculo'];

    $query = "DELETE FROM vehiculos WHERE id_vehiculo = $id_vehiculo";
    $result = $conn->query($query);

    if(!$result){
        die("Query Failed");
    }

    header('Location: ../views/listado_vehiculos.php');
}

//Editar un vehículo
if(isset($_POST['editar_vehiculo'])){
    $id_vehiculo = $_POST['id_vehiculo'];
    $num_serie = $_POST['num_serie'];
    $marca = $_POST['marca'];
    $submarca = $_POST['submarca'];
    $tipo = $_POST['tipo'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $capacidad = $_POST['capacidad'];
    $procedencia = $_POST['procedencia'];

    $query = "UPDATE vehiculos SET num_serie = '$num_serie', marca = '$marca', submarca = '$submarca', tipo = '$tipo', modelo = '$modelo', color = '$color', capacidad = '$capacidad', procedencia = '$procedencia' WHERE id_vehiculo = $id_vehiculo";
    $result = $conn->query($query);

    if(!$result){
        die("Query Failed");
    }

    header('Location: ../views/listado_vehiculos.php');
}


?>