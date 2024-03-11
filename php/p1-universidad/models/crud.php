<?php

//Integrar archivo de conexión 
include('../config/db.php');

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
    header('Location: ../views/listado.php');

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
    header('Location: ../views/listado.php');


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
    header('Location: ../views/listado.php');


    if(!$result){
        die("Query failed");
    }
    echo "Alumno modificado";
}

//Alta de carreras  
if(isset($_POST['alta_carrera'])){
    $nombre = $_POST['nombre_carrera'];

    //Guardar valores a la tabla carreras
    $sql = "INSERT INTO carrera (nombre) VALUES ('$nombre')";
    $result = $conn->query($sql);
    header('Location: ../views/listado_carreras.php');


    if(!$result){
        die("Query failed");
    }
    echo "Carrera dada de alta";
}

if(isset($_POST['alta_materia'])){
    $nombre = $_POST['materia'];
    $unidades = $_POST['unidades'];

    //Guardar valores a la tabla carreras
    $sql = "INSERT INTO materias (nombre, unidades) VALUES ('$nombre', '$unidades')";
    $result = $conn->query($sql);
    header('Location: ../views/listado_materias.php');

    if(!$result){
        die("Query failed");
    }
    echo "Materia dada de alta";

}

//Baja de carreras
if(isset($_GET['eliminar_carrera'])){
    $id = $_GET['eliminar_carrera'];

    //Query para verificar si hay alumnos en la carrera
    $result = $conn->query("SELECT * FROM alumnos WHERE id_carrera = '$id'");

    if ($result->num_rows == 0) {
        //Query para eliminar valores de la tabla carreras
        $sql = "DELETE FROM carrera WHERE id_carrera = '$id'";
        $result = $conn->query($sql);
        header('Location: ../views/listado_carreras.php');

        if(!$result){
            die("Query failed");
        }
        echo "Carrera dada de baja";
    } else {
        echo "No se puede eliminar la carrera, hay alumnos inscritos";
    }

  
}

//Cambios de carreras
if(isset($_POST['cambio_carrera'])){
    $id = $_POST['id_carrera'];
    $nombre = $_POST['carrera'];

    //Query para modificar los valores de la tabla carreras
    $sql = "UPDATE carrera SET nombre = '$nombre' WHERE id_carrera = '$id'";
    $result = $conn->query($sql);
    header('Location: ../views/listado_carreras.php');

    if(!$result){
        die("Query failed");
    }
    echo "Carrera modificada";
}

if(isset($_POST['cambio_materia'])){
    $id = $_POST['id_materia'];
    $nombre = $_POST['materia'];
    $unidades = $_POST['unidades'];

    //Query para modificar los valores de la tabla carreras
    $sql = "UPDATE materias SET nombre = '$nombre', unidades = '$unidades' WHERE id_materia = '$id'";
    $result = $conn->query($sql);
    header('Location: ../views/listado_materias.php');

    if(!$result){
        die("Query failed");
    }
    echo "Materia modificada";

}

if(isset($_GET['eliminar_materia'])){
    $id = $_GET['eliminar_materia'];


    $checkAlumnos = $conn->query("SELECT * FROM alumno_materia WHERE id_materia = '$id'");

    if ($checkAlumnos->num_rows == 0) {

        //Query para eliminar valores de la tabla carreras
        $sql = "DELETE FROM materias WHERE id_materia = '$id'";
        $result = $conn->query($sql);
        header('Location: ../views/listado_materias.php');

        if(!$result){
            die("Query failed");
        }
        echo "Materia dada de baja";
    } else {
        echo "No se puede eliminar la materia, hay alumnos inscritos";
    }
}

if(isset($_POST['asignar_materias'])){
    $materias = $_POST['materias'];
    $id_carrera = $_POST['id_carrera'];

    foreach ($materias as $materia) {
        $check = $conn->query("SELECT * FROM materia_carrera WHERE id_materia = '$materia' AND id_carrera = '$id_carrera'");
        if ($check->num_rows > 0) {
            continue;
        } else {
            $sql = "INSERT INTO materia_carrera (id_materia, id_carrera) VALUES ('$materia', '$id_carrera')";
            $result = $conn->query($sql);
        }
    }

    $check = $conn->query("SELECT * FROM materia_carrera WHERE id_carrera = '$id_carrera'");
    while ($row = $check->fetch_assoc()) {
        if (!in_array($row['id_materia'], $materias)) {
            $sql = "DELETE FROM materia_carrera WHERE id_materia = ".$row['id_materia']." AND id_carrera = ".$id_carrera."";
            $result = $conn->query($sql);
        }
    }


    header('Location: ../views/listado_carreras.php');
    if(!$result){
        die("Query failed");
    }
    echo "Materias asignadas";

}

if(isset($_POST['asignar_materias_alumnos'])){
    $materias = $_POST['materias'];
    $id_alumno = $_POST['id'];

    $contador = 0;

    foreach ($materias as $cant){
        $contador++;
    }

    if($contador >= 7 ){
        foreach ($materias as $materia) {
            $check = $conn->query("SELECT * FROM alumno_materia WHERE id_materia = '$materia' AND id_alumno = '$id_alumno'");
            if ($check->num_rows > 0) {
                continue;
            } else {
                $sql = "INSERT INTO alumno_materia (id_materia, id_alumno) VALUES ('$materia', '$id_alumno')";
                $result = $conn->query($sql);
            }
        }
    
        $check = $conn->query("SELECT * FROM alumno_materia WHERE id_alumno = '$id_alumno'");
        while ($row = $check->fetch_assoc()) {
            if (!in_array($row['id_materia'], $materias)) {
                $sql = "DELETE FROM alumno_materia WHERE id_materia = ".$row['id_materia']." AND id_alumno = ".$id_alumno."";
                $result = $conn->query($sql);
            }
        }

        header('Location: ../views/listado.php');
        if(!$result){
            die("Query failed");
        }
        echo "Materias asignadas";

    } else {
        echo'<script type="text/javascript">
        alert("No puede registrar menos de 7 materias");
        window.location.href="../views/listado.php";
        </script>';
    }
   
    
}

if(isset($_POST['subir_calificaciones'])){
    $id_carrera = $_POST['id_carrera'];
    $id_materia = $_POST['id_materia'];
    echo $id_materia;
    
    $sql = "SELECT * FROM alumno_materia WHERE id_materia = ".$id_materia."";
    $result = $conn->query($sql);

    while($row = $result->fetch_assoc()){
        $sqli = "SELECT * FROM alumnos WHERE id = ".$row['id_alumno']." AND id_carrera = ".$id_carrera."";
        $resulti = $conn->query($sqli);
        $rew = $resulti->fetch_assoc();

        $calificaciones = $_POST['calificacion'.$rew['id']];
        $cali = "";
        foreach($calificaciones as $calificacion){
            $cali .= $calificacion.", ";
        }

        $insert = "UPDATE alumno_materia SET calificaciones = '".$cali."' WHERE id_alumno = ".$rew['id']." AND id_materia = ".$id_materia."";
        echo $insert;
        $result_insert = $conn->query($insert);
    }

    header('Location: ../views/calificaciones.php?id_carrera='.$id_carrera.'&id_materia='.$id_materia.'');

    if(!$result){
        die("Query failed");
    }
    echo "Calificaciones registradas";
}


?>