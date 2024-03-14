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
        die("No puede ser eliminado debido a que tiene registros relacionados");
    }

    header('Location: ../views/listado_vehiculos.php');
}

//Eliminar un vehículo
if(isset($_GET['eliminar_id_vehiculo'])){
    $id_vehiculo = $_GET['eliminar_id_vehiculo'];

    $query = "DELETE FROM vehiculos WHERE id_vehiculo = $id_vehiculo";
    $result = $conn->query($query);

    if(!$result){
        die("No puede ser eliminado debido a que tiene registros relacionados");
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
        die("No puede ser eliminado debido a que tiene registros relacionados");
    }

    header('Location: ../views/listado_vehiculos.php');
}

//Agregar servicio
if(isset($_POST['alta_servicios'])){
    $nombre = $_POST['nombre'];
    $costo = $_POST['costo'];

    $query = "INSERT INTO servicios(nombre, costo) VALUES ('$nombre', '$costo')";
    $result = $conn->query($query);

    if(!$result){
        die("No puede ser eliminado debido a que tiene registros relacionados");
    }

    header('Location: ../views/listado_servicios.php');

}

//Eliminar un servicio
if(isset($_GET['eliminar_id_servicios'])){
    $id_servicio = $_GET['eliminar_id_servicios'];

    $query = "DELETE FROM servicios WHERE id_servicios = $id_servicio";
    $result = $conn->query($query);

    if(!$result){
        die("No puede ser eliminado debido a que tiene registros relacionados");
    }

    header('Location: ../views/listado_servicios.php');

}

//Editar un servicio
if(isset($_POST['editar_servicios'])){
    $id_servicios = $_POST['id_servicios'];
    $nombre = $_POST['nombre'];
    $costo = $_POST['costo'];

    $query = "UPDATE servicios SET nombre = '$nombre', costo = '$costo' WHERE id_servicios = $id_servicios";
    $result = $conn->query($query);

    if(!$result){
        die("No puede ser eliminado debido a que tiene registros relacionados");
    }

    header('Location: ../views/listado_servicios.php');
}

//Agregar taller
if(isset($_POST['alta_taller'])){
    $fecha = $_POST['fecha'];
    $id_servicio = $_POST['id_servicio'];
    $id_vehiculo = $_POST['id_vehiculo'];

    $query = "INSERT INTO prestacion_taller(fecha_ingreso, id_servicio, id_vehiculo) VALUES ('$fecha', '$id_servicio', '$id_vehiculo')";
    $result = $conn->query($query);

    if(!$result){
        die("No puede ser eliminado debido a que tiene registros relacionados");
    }

    header('Location: ../views/listado_taller.php');

}

//Eliminar un taller
if(isset($_GET['eliminar_id_taller'])){
    $id_taller = $_GET['eliminar_id_taller'];

    $query = "DELETE FROM prestacion_taller WHERE id_taller = $id_taller";
    $result = $conn->query($query);

    if(!$result){
        die("No puede ser eliminado debido a que tiene registros relacionados");
    }

    header('Location: ../views/listado_taller.php');

}

//Editar un taller
if(isset($_POST['editar_taller'])){
    $id_taller = $_POST['id_taller'];
    $fecha = $_POST['fecha'];
    $id_servicio = $_POST['id_servicio'];
    $id_vehiculo = $_POST['id_vehiculo'];

    $query = "UPDATE prestacion_taller SET fecha_ingreso = '$fecha', id_servicio = '$id_servicio', id_vehiculo = '$id_vehiculo' WHERE id_taller = $id_taller";
    $result = $conn->query($query);

    if(!$result){
        echo $query;
        die("No puede ser eliminado debido a que tiene registros relacionados");
    }

    header('Location: ../views/listado_taller.php');
}


?>