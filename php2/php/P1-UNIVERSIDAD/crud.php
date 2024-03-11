<?php

//Integrar archivo de conexi+on

include 'db.php';

// Alta de archivo de conexión
    if(isset($_POST['alta_alumno'])){
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];
        $id_carrera = $_POST['id_carrera'];

    //Guardar valores a la tabla alumnos

        $sql = "INSERT INTO alumnos (matricula, nombre, edad, email, id_carrera) VALUES ('$matricula', '$nombre', '$edad', '$email', '$id_carrera')";
        $result = $conn->query($sql);
        header("Location: listado_alumnos.php");
    }

// Verificar si se ha enviado el ID del alumno por GET para eliminarlo
if(isset($_GET['eliminar_alumno'])) {
    $id_alumno = $_GET['eliminar_alumno'];

    // Eliminar las relaciones del alumno con las materias en la tabla alumnos_materias
    $sql_delete_alumnos_materias = "DELETE FROM alumnos_materias WHERE id_alumno = $id_alumno";
    $result_delete_alumnos_materias = $conn->query($sql_delete_alumnos_materias);

    if (!$result_delete_alumnos_materias) {
        // Manejo de error si la eliminación falla
        echo "Error al eliminar las relaciones del alumno con las materias: " . $conn->error;
    }

    // Eliminar las calificaciones del alumno en la tabla calificaciones
    $sql_delete_calificaciones = "DELETE FROM calificaciones WHERE id_alumno = $id_alumno";
    $result_delete_calificaciones = $conn->query($sql_delete_calificaciones);

    if (!$result_delete_calificaciones) {
        // Manejo de error si la eliminación falla
        echo "Error al eliminar las calificaciones del alumno: " . $conn->error;
    }

    // Finalmente, eliminar el registro del alumno en la tabla alumnos
    $sql_delete_alumno = "DELETE FROM alumnos WHERE id = $id_alumno";
    $result_delete_alumno = $conn->query($sql_delete_alumno);

    if (!$result_delete_alumno) {
        // Manejo de error si la eliminación falla
        echo "Error al eliminar el registro del alumno: " . $conn->error;
    } else {
        // Redireccionar de regreso a listado_alumnos.php después de eliminar
        header("Location: listado_alumnos.php");
        exit();
    }
}

//Cambios de alumnos

    if(isset($_POST['cambio_alumno'])){
        $id = $_POST['id'];
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $edad = $_POST['edad'];
        $email = $_POST['email'];
        $id_carrera = $_POST['id_carrera']; 

        //query de actualización en la tabla alumnos
    
        $sql = "UPDATE alumnos SET matricula='$matricula', nombre='$nombre',edad='$edad', email='$email', id_carrera='$id_carrera' WHERE id=$id";
        $result = $conn->query($sql);
        header("Location: listado_alumnos.php");

    }

//Alta de carreras

    if(isset($_POST['alta_carrera'])){
        $nombre = $_POST['nombre'];
    
        //Guardar valores a la tabla carreras

        $sql = "INSERT INTO carrera (nombre) VALUES ('$nombre')";
        $result = $conn->query($sql);
        header("Location: listado_carreras.php");
    }

//Baja de carreras
    if(isset($_GET['eliminar_carrera'])){
        $id = $_GET['eliminar_carrera'];
        
        $sql = "DELETE FROM carrera WHERE id=$id";
        $result = $conn->query($sql);
        header("Location: listado_carreras.php");
    }

//Cambios de carreras 

    if(isset($_POST['cambio_carrera'])){
        $id = $_POST['id_carrera'];
        $nombre = $_POST['nombre'];

        //query de actualización en la tabla carreras

        $sql = "UPDATE carrera SET nombre='$nombre' WHERE id_carrera=$id";
        $result = $conn->query($sql);
        header("Location: listado_carreras.php");
    }

    // Verificar si se ha enviado el formulario para eliminar una carrera
    if(isset($_POST['eliminar_carrera'])) {
        $id_carrera = $_POST['id_carrera'];

        // Eliminar las relaciones en la tabla materia_carrera
        $sql_delete_materia_carrera = "DELETE FROM materia_carrera WHERE id_carrera = $id_carrera";
        $result_delete_materia_carrera = $conn->query($sql_delete_materia_carrera);

        if (!$result_delete_materia_carrera) {
            // Manejo de error si falla la eliminación de relaciones
            echo "Error al eliminar las relaciones de la carrera: " . $conn->error;
        }

        // Después de eliminar las relaciones, eliminar la carrera de la base de datos
        $sql_delete_carrera = "DELETE FROM carrera WHERE id_carrera = $id_carrera";
        $result_delete_carrera = $conn->query($sql_delete_carrera);

        header("Location: listado_carreras.php");

    }
//Alta de materia

if(isset($_POST['alta_materia'])){
    $nombre = $_POST['nombre'];

    //Guardar valores a la tabla materias

    $sql = "INSERT INTO materias (nombre) VALUES ('$nombre')";
    $result = $conn->query($sql);
    header("Location: listado_materias.php");
}

//Cambios de materias

if(isset($_POST['cambio_materia'])){
    $id = $_POST['id_materia'];
    $nombre = $_POST['nombre'];

    //query de actualización en la tabla carreras

    $sql = "UPDATE materias SET nombre='$nombre' WHERE id_materia=$id";
    $result = $conn->query($sql);
    header("Location: listado_materias.php");
}

    // Verificar si se ha enviado el ID de la materia a eliminar
    if(isset($_GET['eliminar_materia'])) {
        $id_materia = $_GET['eliminar_materia'];

        // Eliminar las relaciones de la materia con las carreras en la tabla materia_carrera
        $sql_delete_materia_carrera = "DELETE FROM materia_carrera WHERE id_materia = ?";
        
        // Preparar la consulta
        $stmt = $conn->prepare($sql_delete_materia_carrera);
        
        // Vincular el parámetro
        $stmt->bind_param("i", $id_materia);
        
        // Ejecutar la consulta
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // La eliminación fue exitosa
            echo "Relaciones de la materia con las carreras eliminadas correctamente.";
        } else {
            // No se eliminaron registros, probablemente porque no había relaciones
            echo "No se encontraron relaciones de la materia con las carreras para eliminar.";
        }

        // Finalmente, eliminar el registro de la materia en la tabla materias
        $sql_delete_materia = "DELETE FROM materias WHERE id_materia = ?";
        
        // Preparar la consulta
        $stmt = $conn->prepare($sql_delete_materia);
        
        // Vincular el parámetro
        $stmt->bind_param("i", $id_materia);
        
        // Ejecutar la consulta
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // La eliminación fue exitosa
            echo "Materia eliminada correctamente.";
        } else {
            // No se eliminó el registro, probablemente porque no existía
            echo "No se encontró la materia a eliminar.";
        }

        // Redireccionar de regreso a listado_materias.php después de eliminar
        header("Location: listado_materias.php");
        exit();
    }

//Asignar materia a carrera
if(isset($_POST['alta_materia_carrera'])){
    $id_materia = $_POST['id_materia']; // Este valor debe ser pasado desde el formulario
    $id_carrera = $_POST['id_carrera'];

    // Verifica que los IDs de materia y carrera existan y sean válidos
    $sql_check_materia = "SELECT * FROM materias WHERE id_materia = $id_materia";
    $sql_check_carrera = "SELECT * FROM carrera WHERE id_carrera = $id_carrera";

    $result_materia = $conn->query($sql_check_materia);
    $result_carrera = $conn->query($sql_check_carrera);

    if($result_materia->num_rows > 0 && $result_carrera->num_rows > 0) {
        // Ambos IDs existen, procede a insertar en la tabla materia_carrera
        $sql_insert = "INSERT INTO materia_carrera (id_materia, id_carrera, unidades) VALUES ($id_materia, $id_carrera,3)";
        $result_insert = $conn->query($sql_insert);
    }
    header("Location: listado_materias.php");
}

// Asignar materias a alumno
if(isset($_POST['asignar_materias_alumno'])){
    $id_alumno = $_POST['id']; // ID del alumno seleccionado
    $materias = $_POST['materias']; // Array con los IDs de las materias seleccionadas

    // Verificar que el ID del alumno sea válido
    $sql_check_alumno = "SELECT * FROM alumnos WHERE id = $id_alumno";
    $result_check_alumno = $conn->query($sql_check_alumno);

    if($result_check_alumno->num_rows > 0) {
        // ID de alumno válido, proceder a insertar en la tabla alumnos_materias
        foreach($materias as $id_materia) {
            // Verificar que el ID de la materia sea válida
            $sql_check_materia = "SELECT * FROM materias WHERE id_materia = $id_materia";
            $result_check_materia = $conn->query($sql_check_materia);

            if($result_check_materia->num_rows > 0) {
                // ID de materia válida, proceder a insertar en la tabla alumnos_materias
                $sql_insert = "INSERT INTO alumnos_materias (id_alumno, id_materia) VALUES ($id_alumno, $id_materia)";
                $result_insert = $conn->query($sql_insert);
            }
        }
        header("Location: listado_alumnos.php");
    } else {
        echo "ID de alumno no válido.";
    }
}   

// Verificar si se ha enviado el formulario
if (isset($_POST['guardar_calificaciones'])) {
    // Obtener el id_alumno de la URL
    $id_alumno = $_GET['id'];

    // Recorrer todas las calificaciones enviadas por el formulario
    foreach ($_POST as $key => $value) {
        // Verificar si el nombre del input corresponde al formato de calificaciones
        if (preg_match('/calif_(\d+)-(\d+)/', $key, $matches)) {
            $id_materia = $matches[1]; // Obtener el ID de la materia
            $unidad = $matches[2]; // Obtener el número de unidad
            $calificacion = $value; // Obtener la calificación

            // Verificar si ya existe una fila para esta combinación de alumno y materia
            $sql_check_exists = "SELECT * FROM calificaciones WHERE id_alumno = $id_alumno AND id_materia = $id_materia";
            $result_check_exists = $conn->query($sql_check_exists);

            if ($result_check_exists->num_rows > 0) {
                // Si ya existe una fila, actualizamos la calificación
                $sql_update_calificacion = "UPDATE calificaciones 
                                            SET u$unidad = '$calificacion' 
                                            WHERE id_alumno = $id_alumno AND id_materia = $id_materia";

                $result_update = $conn->query($sql_update_calificacion);
                if (!$result_update) {
                    // Manejo de error si la actualización falla
                    echo "Error al actualizar las calificaciones: " . $conn->error;
                }
            } else {
                // Si no existe una fila, insertamos una nueva fila para la calificación
                $sql_insert_calificacion = "INSERT INTO calificaciones (id_alumno, id_materia, u$unidad, promedio) 
                                            VALUES ($id_alumno, $id_materia, 0, 0)";

                $result_insert = $conn->query($sql_insert_calificacion);
                if (!$result_insert) {
                    // Manejo de error si la inserción falla
                    echo "Error al insertar las calificaciones: " . $conn->error;
                }
            }
        }
    }

    // Calcular los promedios y actualizarlos en la tabla calificaciones
    $sql_materias = "SELECT id_materia FROM calificaciones WHERE id_alumno = $id_alumno";
    $result_materias = $conn->query($sql_materias);

    while ($row_materia = $result_materias->fetch_assoc()) {
        $id_materia = $row_materia['id_materia'];

        $sql_calificaciones = "SELECT u1, u2, u3 FROM calificaciones WHERE id_alumno = $id_alumno AND id_materia = $id_materia";
        $result_calificaciones = $conn->query($sql_calificaciones);
        $row_calificaciones = $result_calificaciones->fetch_assoc();

        $calif_u1 = $row_calificaciones['u1'];
        $calif_u2 = $row_calificaciones['u2'];
        $calif_u3 = $row_calificaciones['u3'];

        $promedio = ($calif_u1 + $calif_u2 + $calif_u3) / 3;

        $sql_update_promedio = "UPDATE calificaciones 
                                SET promedio = $promedio 
                                WHERE id_alumno = $id_alumno AND id_materia = $id_materia";

        $result_update_promedio = $conn->query($sql_update_promedio);
        if (!$result_update_promedio) {
            // Manejo de error si la actualización del promedio falla
            echo "Error al actualizar el promedio: " . $conn->error;
        }
    }

    // Redireccionar de regreso a guardar_calificaciones.php después de guardar
    header("Location: calificaciones.php?id=$id_alumno");
    exit();
}
