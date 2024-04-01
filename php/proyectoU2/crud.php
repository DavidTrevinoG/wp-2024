<?php
    //Integrar archivo de conexión
    include 'bd.php';

    //Alta Alumno
    if(isset($_POST['alta_alumno'])){
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $id_carrera = $_POST['id_carrera'];
        $id_tutor = $_POST['id_tutor'];


        //Guardar datos
        $sql = "INSERT INTO alumno (matricula,nombre,correo,id_carrera,id_tutor) VALUES ('$matricula' , '$nombre' , '$correo' , 
        '$id_carrera' , '$id_tutor')";

        $result = $conn->query($sql);

        if($result){
            echo "Los datos han sigo guardados";
            
        }else{
            echo "Los datos no se pudieron guardar";
        }
        header('Location: listado_alumnos.php');
    }

    //Baja de Alumno
    if(isset($_GET['baja_alumno'])){
        $id = $_GET['baja_alumno'];
        //QUERY PARA ELIMINAR ALUMNO

        $checkTutoria = $conn->query("SELECT * FROM tutoria WHERE id_alumno = $id");
        if($checkTutoria->num_rows > 0){
            echo "";
            echo "<script>";
            echo "setTimeout(function() {";
            echo "  window.location.href = 'listado_alumnos.php';";
            echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
            echo "</script>";
            echo "<script>alert('No se puede eliminar el alumno porque tiene tutorías asignadas.');</script>";
        }else{
            $checkAsesoria = $conn->query("SELECT * FROM asesoria WHERE id_alumno = $id");
            if($checkAsesoria->num_rows > 0){
                echo "";
                echo "<script>";
                echo "setTimeout(function() {";
                echo "  window.location.href = 'listado_alumnos.php';";
                echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                echo "</script>";
                echo "<script>alert('No se puede eliminar el alumno porque tiene asesorías asignadas.');</script>";
            }else {
                $sql = "DELETE FROM alumno WHERE id = $id";
                $result = $conn->query($sql);
                if($result){
                    echo "Los datos han sigo guardados";
                }else{
                    echo "Los datos no se pudieron guardar";
                }
                echo "<script>";
                echo "setTimeout(function() {";
                echo "  window.location.href = 'listado_alumnos.php';";
                echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                echo "</script>";
                echo "<script>alert('La consulta fue exitosa');</script>";
            }
        }
    }

    //Editar alumno
    if(isset($_POST['cambios_alumno'])){
        $id = $_POST['id'];
        $matricula = $_POST['matricula'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $id_carrera = $_POST['id_carrera'];
        $id_tutor = $_POST['id_tutor'];

        //Query para actualizar los datos
        $sql = "UPDATE alumno SET matricula = '$matricula', nombre = '$nombre', correo = '$correo', id_carrera = '$id_carrera', 
        id_tutor = '$id_tutor' WHERE id = $id";
        $result = $conn->query($sql);
        header('Location: listado_alumnos.php');
    }



/*-----------------------------------------AQUI VA EL CRUD DE TUTORES--------------------------------------------*/

    //Alta tutor
    if(isset($_POST['alta_tutor'])){
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $id_carrera = $_POST['id_carrera'];

        //QUERY PARA GUARDAR DATOS
        $sql = "INSERT INTO tutor (nombre, correo, id_carrera) VALUES ('$nombre', '$correo', '$id_carrera')";
        $result = $conn->query($sql);

        if($result){
            echo "Los datos han sigo guardados";
        }else{
            echo "Los datos no se pudieron guardar";
        }
        header('Location: listado_tutores.php');

    }
    
    //Baja tutor
    if(isset($_GET['baja_tutor'])){
        $id = $_GET['baja_tutor'];
        //Query para eliminar tutor

        $checkTutoria = $conn->query("SELECT * FROM tutoria WHERE id_tutor = $id");
        if($checkTutoria->num_rows > 0){
            echo "";
            echo "<script>";
            echo "setTimeout(function() {";
            echo "  window.location.href = 'listado_tutores.php';";
            echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
            echo "</script>";
            echo "<script>alert('No se puede eliminar el tutor porque tiene tutorías asignadas.');</script>";
        }else{
            $checkAsesoria = $conn->query("SELECT * FROM asesoria WHERE id_asesor = $id");
            if($checkAsesoria->num_rows > 0){
                echo "";
                echo "<script>";
                echo "setTimeout(function() {";
                echo "  window.location.href = 'listado_tutores.php';";
                echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                echo "</script>";
                echo "<script>alert('No se puede eliminar el tutor porque tiene asesorías asignadas.');</script>";
            }else {
                $checkAlumno = $conn->query("SELECT * FROM alumno WHERE id_tutor = $id");
                if($checkAlumno->num_rows > 0){
                    echo "";
                    echo "<script>";
                    echo "setTimeout(function() {";
                    echo "  window.location.href = 'listado_tutores.php';";
                    echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                    echo "</script>";
                    echo "<script>alert('No se puede eliminar el tutor porque tiene alumnos asignados.');</script>";
                }else{
                    $sql = "DELETE FROM tutor WHERE id = $id";
                    $result = $conn->query($sql);
                    if($result){
                        echo "Los datos han sigo guardados";
                    }else{
                        echo "Los datos no se pudieron guardar";
                    }
                    echo "<script>";
                    echo "setTimeout(function() {";
                    echo "  window.location.href = 'listado_tutores.php';";
                    echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                    echo "</script>";
                    echo "<script>alert('La consulta fue exitosa');</script>";
                }
            }
        }
    }

    //Editar tutor
    if(isset($_POST['cambios_tutor'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $correo = $_POST['correo'];
        $id_carrera = $_POST['id_carrera'];

        //Query para actualizar los datos
        $sql = "UPDATE tutor SET nombre = '$nombre',correo = '$correo',id_carrera = '$id_carrera' WHERE id = $id";

        $result = $conn->query($sql);
        header('Location: listado_tutores.php');
    }

/*-----------------------------------------AQUI VA EL CRUD DE CARRERAS--------------------------------------------*/
    //Alta carrera
    if(isset($_POST['alta_carrera'])){
        $nombre = $_POST['nombre'];
        //QUERY PARA GUARDAR DATOS
        $sql = "INSERT INTO carrera (nombre) VALUES ('$nombre')";
        $result = $conn->query($sql);

        if($result){
            echo "Los datos han sigo guardados";
        }else{
            echo "Los datos no se pudieron guardar";
        }
        header('Location: listado_carrera.php');
    }

    //Baja carrera
    if(isset($_GET['baja_carrera'])){
        $id = $_GET['baja_carrera'];
        //Query para eliminar la carrera

        $checkTutoria = $conn->query("SELECT * FROM tutoria WHERE id_carrera = $id");
        if($checkTutoria->num_rows > 0){
            echo "";
            echo "<script>";
            echo "setTimeout(function() {";
            echo "  window.location.href = 'listado_carrera.php';";
            echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
            echo "</script>";
            echo "<script>alert('No se puede eliminar la carrera porque tiene tutorías asignadas.');</script>";
        }else{
            $checkAsesoria = $conn->query("SELECT * FROM asesoria WHERE id_carrera = $id");
            if($checkAsesoria->num_rows > 0){
                echo "";
                echo "<script>";
                echo "setTimeout(function() {";
                echo "  window.location.href = 'listado_carrera.php';";
                echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                echo "</script>";
                echo "<script>alert('No se puede eliminar la carrera porque tiene asesorías asignadas.');</script>";
            }else {
                $checkAlumno = $conn->query("SELECT * FROM alumno WHERE id_carrera = $id");
                        if($checkAlumno->num_rows > 0){
                            echo "";
                            echo "<script>";
                            echo "setTimeout(function() {";
                            echo "  window.location.href = 'listado_carrera.php';";
                            echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                            echo "</script>";
                            echo "<script>alert('No se puede eliminar la carrera porque tiene alumnos asignados.');</script>";
               
                }else{
                    $checkTutor = $conn->query("SELECT * FROM tutor WHERE id_carrera = $id");
                    if($checkTutor->num_rows > 0){
                        echo "";
                        echo "<script>";
                        echo "setTimeout(function() {";
                        echo "  window.location.href = 'listado_carrera.php';";
                        echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                        echo "</script>";
                        echo "<script>alert('No se puede eliminar la carrera porque tiene tutores asignados.');</script>";
                    }else{
                        $checkMateria = $conn->query("SELECT * FROM materia WHERE id_carrera = $id");
                        if($checkMateria->num_rows > 0){
                            echo "";
                            echo "<script>";
                            echo "setTimeout(function() {";
                            echo "  window.location.href = 'listado_carrera.php';";
                            echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                            echo "</script>";
                            echo "<script>alert('No se puede eliminar la carrera porque tiene materias asignadas.');</script>";
                        }else{
                            $sql = "DELETE FROM carrera WHERE id = '$id'";
                            $result = $conn->query($sql);
                            if($result){
                                echo "Los datos han sigo guardados";
                            }else{
                                echo "Los datos no se pudieron guardar";
                            }
                            echo "<script>";
                            echo "setTimeout(function() {";
                            echo "  window.location.href = 'listado_carrera.php';";
                            echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                            echo "</script>";
                            echo "<script>alert('La consulta fue exitosa');</script>";
                }
            
            }
        }
    
        

        
            }
        }
    }

    //Cambia carrera
    if(isset($_POST['cambios_carrera'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];

        // Consulta SQL para actualizar el nombre de la carrera
        $sql = "UPDATE carrera SET nombre = '$nombre' WHERE id = $id";

        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo "Carrera actualizada correctamente.";
        } else {
            echo "Error al actualizar la carrera: " . $conn->error;
        }
        header('Location: listado_carrera.php');
    }

/*-----------------------------------------AQUI VA EL CRUD DE MATERIAS--------------------------------------------*/
    //Alta materias
    if(isset($_POST['alta_materia'])){
        $nombre = $_POST['nombre'];
        $id_carrera = $_POST['id_carrera'];
        
    
        // Guardar los valores en la tabla de materias
        $sql = "INSERT INTO materia (nombre, id_carrera) VALUES ('$nombre', '$id_carrera')";
        $result = $conn->query($sql);
    
        if($result){
            echo "Materia agregada exitosamente.";
        } else {
            echo "Error al agregar la materia: " . $conn->error;
        }
        header('Location: listado_materias.php');
        

    }

    // Baja materia
    if(isset($_GET['eliminar_materia'])){
        $id = $_GET['eliminar_materia'];
        // Query para eliminar la materia

        $checkTutoria = $conn->query("SELECT * FROM tutoria WHERE id_materia = $id");
        if($checkTutoria->num_rows > 0){
            echo "";
            echo "<script>";
            echo "setTimeout(function() {";
            echo "  window.location.href = 'listado_materias.php';";
            echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
            echo "</script>";
            echo "<script>alert('No se puede eliminar la materia porque tiene tutorías asignadas.');</script>";
        }else{
            $checkAsesoria = $conn->query("SELECT * FROM asesoria WHERE id_materia = $id");
            if($checkAsesoria->num_rows > 0){
                echo "";
                echo "<script>";
                echo "setTimeout(function() {";
                echo "  window.location.href = 'listado_materias.php';";
                echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                echo "</script>";
                echo "<script>alert('No se puede eliminar la materia porque tiene asesorías asignadas.');</script>";
            }else {
                $sql = "DELETE FROM materia WHERE id = $id";
                $result = $conn->query($sql);
                if($result){
                    echo "Los datos han sigo guardados";
                }else{
                    echo "Los datos no se pudieron guardar";
                }
                echo "<script>";
                echo "setTimeout(function() {";
                echo "  window.location.href = 'listado_materias.php';";
                echo "});"; // Redirige después de 2 segundos (2000 milisegundos)
                echo "</script>";
                echo "<script>alert('La consulta fue exitosa');</script>";
            }
        }
    }

    if(isset($_POST['cambios_materia'])){

        $id_materia = $_POST['id_materia']; 
        $nombre = $_POST['nombre'];
        $id_carrera = $_POST['id_carrera'];
        // Query para actualizar la materia
        $sql = "UPDATE materia SET nombre = '$nombre', id_carrera = '$id_carrera' WHERE id = $id_materia";
        $result = $conn->query($sql);
        header('Location: listado_materias.php');
    }
/*-----------------------------------------AQUI VA EL CRUD DE TUTORIAS--------------------------------------------*/
    //Alta tutoria
    if(isset($_POST['alta_tutoria'])){
        $id_carrera = $_POST['id_carrera'];
        $id_materia = $_POST['id_materia'];
        $id_alumno = $_POST['id_alumno'];
       
        $lookFortut = $conn->query("SELECT id_tutor FROM alumno WHERE id = $id_alumno");
        $row = $lookFortut->fetch_assoc();
        $id_tutor = $row['id_tutor'];

        $observaciones = $_POST['observaciones'];
        $fecha = $_POST['fecha'];

        //Query para cargar datos
        $sql = "INSERT INTO tutoria (id_carrera, id_materia, id_alumno, id_tutor, observaciones, fecha) VALUES 
        ('$id_carrera', '$id_materia', '$id_alumno', '$id_tutor', '$observaciones', '$fecha')";


        $result = $conn->query($sql);

        if($result){
            echo "Materia agregada exitosamente.";
            header('Location: listado_tutoria.php');
        } else {
            echo "Error al agregar la materia: " . $conn->error;
        }
    }

    //Baja tutoria
    if(isset($_GET['baja_tutoria'])){
        $id = $_GET['baja_tutoria'];
        //Query para dar de baja la tutoria
        $sql = "DELETE FROM tutoria WHERE id = '$id' ";
        $result = $conn->query($sql);

        if($result){
            echo "Tutoria eliminada correctamente.";
            header('Location: listado_tutoria.php');
        } else {
            echo "Error al eliminar la tutoria: " . $conn->error;
        }
    }

    //Actualizar tutoria
    if(isset($_POST['cambios_tutoria'])){
        $id = $_POST['id'];
        $id_carrera = $_POST['id_carrera'];
        $id_materia = $_POST['id_materia'];
        $id_alumno = $_POST['id_alumno'];
        $observaciones = $_POST['observaciones'];
        $fecha = $_POST['fecha'];

        $fecha_actual = date("Y-m-d");
        
        // Verificar si la fecha ingresada es igual o después de la fecha actual
        if ($fecha >= $fecha_actual) {
            $lookFortut = $conn->query("SELECT id_tutor FROM alumno WHERE id = $id_alumno");
            $row = $lookFortut->fetch_assoc();
            $id_tutor = $row['id_tutor'];

            $sql = "UPDATE tutoria SET id_carrera='$id_carrera',id_materia='$id_materia',id_alumno='$id_alumno', id_tutor='$id_tutor',
            observaciones = '$observaciones', fecha='$fecha' WHERE id = $id";
            echo "La fecha ingresada es igual o después de la fecha actual.";
            
        } else {

            $sql = "UPDATE tutoria SET id_carrera='$id_carrera',id_materia='$id_materia',id_alumno='$id_alumno',
             observaciones = '$observaciones', fecha='$fecha' WHERE id = $id";
            echo "La fecha ingresada es anterior a la fecha actual.";

        }
        
 
        
        $result = $conn->query($sql);
        if($result){
            echo "Tutoria eliminada correctamente.";
            header('Location: listado_tutoria.php');
        } else {
            echo "Error al eliminar la tutoria: " . $conn->error;
        }
    }
/*-----------------------------------------AQUI VA EL CRUD DE ASESORIA--------------------------------------------*/
    if(isset($_POST['alta_asesoria'])){
        $id_carrera = $_POST['id_carrera'];
        $id_materia = $_POST['id_materia'];
        $id_alumno = $_POST['id_alumno'];
        $id_asesor = $_POST['id_asesor'];
        $observaciones = $_POST['observaciones'];
        $fecha = $_POST['fecha'];

        // Query para guardar datos
        $sql = "INSERT INTO asesoria (id_carrera, id_materia, id_alumno, id_asesor, observaciones, fecha) 
                VALUES ('$id_carrera', '$id_materia', '$id_alumno', '$id_asesor', '$observaciones', '$fecha')";
        $result = $conn->query($sql);

        if($result){
            echo "Los datos han sido guardados";
        }else{
            echo "Error al guardar los datos: " . $conn->error;
        }
        header('Location: listado_asesoria.php');
    }

    // Baja Asesoría
    if(isset($_GET['baja_asesoria'])){
        $id = $_GET['baja_asesoria'];

        // Query para eliminar Asesoría
        $sql = "DELETE FROM asesoria WHERE id = '$id'";
        $result = $conn->query($sql);
        
        if($result){
            echo "Asesoría eliminada correctamente.";
        } else {
            echo "Error al eliminar la asesoría: " . $conn->error;
        }
        header('Location: listado_asesoria.php');
    }

    // Editar Asesoría
    if(isset($_POST['cambios_asesoria'])){
        $id = $_POST['id'];
        $id_carrera = $_POST['id_carrera'];
        $id_materia = $_POST['id_materia'];
        $id_alumno = $_POST['id_alumno'];
        $id_asesor = $_POST['id_asesor'];
        $observaciones = $_POST['observaciones'];
        $fecha = $_POST['fecha'];

        // Query para actualizar los datos
        $sql = "UPDATE asesoria SET id_carrera='$id_carrera', id_materia='$id_materia', id_alumno='$id_alumno', 
                id_asesor='$id_asesor', observaciones='$observaciones', fecha='$fecha' WHERE id = '$id'";
        $result = $conn->query($sql);
        
        if($result){
            echo "Asesoría actualizada correctamente.";
        } else {
            echo "Error al actualizar la asesoría: " . $conn->error;
        }
        header('Location: listado_asesoria.php');
    }

?>