<?php

//Integrar archivo de conexión 
include('db.php');

//Alta de alumnos
if(isset($_POST['alta_alumno'])){
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $id_carrera = $_POST['id_carrera'];

    //Guardar valores a la tabla alumnos
    $sql = "INSERT INTO alumnos (matricula, nombre, edad, email, id_carrera) VALUES ('$matricula', '$nombre', '$edad', '$email', '$id_carrera')";
    $result = $conn->query($sql);
    header('Location: lsitado.php');

    if(!$result){
        die("Query failed");
    }
    echo "Alumno dado de alta";
}
//Baja de alumnos
if(isset($_GET['eliminar_alumno'])){
    $id = $_GET['eliminar_alumno'];

    //Query para eliminar valores de la tabla alumnos
    $sql = "DELETE FROM alumnos WHERE id = '$id'";
    $result = $conn->query($sql);
    header('Location: lsitado.php');

    if(!$result){
        die("Query failed");
    }
    echo "Alumno dado de baja";
}

//Cambios de alumnos
if(isset($_POST['cambio_alumno'])){
    $id = $_POST['id'];
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $edad = $_POST['edad'];
    $email = $_POST['email'];
    $id_carrera = $_POST['id_carrera'];


    //Query para modificar los valores de la tabla alumnos
    $sql = "UPDATE alumnos SET matricula = '$matricula', nombre = '$nombre', edad = '$edad', email = '$email', id_carrera = '$id_carrera' WHERE id = '$id'";
    $result = $conn->query($sql);
    header('Location: lsitado.php');

    if(!$result){
        die("Query failed");
    }
    echo "Alumno modificado";
}

//Alta de carreras  
if(isset($_POST['alta_carrera'])){
    $nombre = $_POST['nombre'];

    //Guardar valores a la tabla carreras
    $sql = "INSERT INTO carreras (nombre) VALUES ('$nombre')";
    $result = $conn->query($sql);
    header('Location: lsitado.php');

    if(!$result){
        die("Query failed");
    }
    echo "Carrera dada de alta";
}

//Baja de carreras
if(isset($_GET['eliminar_carrera'])){
    $id = $_GET['eliminar_carrera'];

    //Query para eliminar valores de la tabla carreras
    $sql = "DELETE FROM carreras WHERE id = '$id'";
    $result = $conn->query($sql);
    header('Location: lsitado.php');

    if(!$result){
        die("Query failed");
    }
    echo "Carrera dada de baja";
}

//Cambios de carreras
if(isset($_POST['cambio_carrera'])){
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];

    //Query para modificar los valores de la tabla carreras
    $sql = "UPDATE carreras SET nombre = '$nombre' WHERE id = '$id'";
    $result = $conn->query($sql);
    header('Location: lsitado.php');

    if(!$result){
        die("Query failed");
    }
    echo "Carrera modificada";
}

?>