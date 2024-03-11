<?php 

//Creación del archivo PDF
header("Pragma: public");
header("Expires: 0");
$filename = "ListadoAlumnos.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

// Conexión a la base de datos
include '../config/db.php';

// Consulta SQL para obtener todos los registros de la tabla alumnos
$sql = 'SELECT alumnos.id, alumnos.matricula, alumnos.nombre, alumnos.edad, alumnos.email, 
carrera.nombre as carrera_nombre FROM alumnos INNER JOIN carrera ON alumnos.id_carrera = carrera.id_carrera';
$result = $conn->query($sql);


?>
<html lang="es">
    <head>
        <title>Listado de carreras</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2> Listado de Alumnos </h2>
            <table class="table" id="table">
            <thead>
                <th>ID Alumno</th>
                <th>Matrícula</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Carrera</th>
                <th>Materias</th>
            </thead>
            <tbody>
                <?php 
                    // Recorrido en la tabla de carreras para obtener los registros
                    while ($row = $result->fetch_assoc()){ 
                        $query = "SELECT * FROM alumno_materia WHERE id_alumno = ".$row['id']."";   
                        $result2 = $conn->query($query);
                        
                        $materias = "";

                        while ($row2 = $result2->fetch_assoc()){
                            $query2 = "SELECT * FROM materias WHERE id_materia = ".$row2['id_materia']."";
                            $result3 = $conn->query($query2);
                            $row3 = $result3->fetch_assoc();
                            $materias .= $row3['nombre'].", ";
                        }
                ?>
                <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['matricula'];?></td>
                <td><?php echo $row['nombre'];?></td>
                <td><?php echo $row['edad'];?></td>
                <td><?php echo $row['email'];?></td>
                <td><?php echo $row['carrera_nombre'];?></td>
                <td><?php echo $materias;?></td>
                </tr>
                <?php } ?>

            </tbody>
            </table>
        </div>
    </body>
</html>