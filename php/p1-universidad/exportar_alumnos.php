<?php 

//Creación del archivo PDF
header("Pragma: public");
header("Expires: 0");
$filename = "ListadoAlumnos.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

// Conexión a la base de datos
include 'db.php';

// Consulta SQL para obtener todos los registros de la tabla alumnos
$sql = 'SELECT alumnos.id, alumnos.matricula, alumnos.nombre, alumnos.edad, alumnos.email, 
carrera.nombre as carrera_nombre FROM alumnos INNER JOIN carrera ON alumnos.id_carrera = carrera.id_carrera';
$result = $conn->query($sql);


?>
<table class="table" id="table">
    <thead>
        <th>ID Alumno</th>
        <th>Matrícula</th>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Email</th>
        <th>Carrera</th>
    </thead>
    <tbody>
        <?php 
            // Recorrido en la tabla de carreras para obtener los registros
            while ($row = $result->fetch_assoc()){ 
        ?>
        <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['matricula'];?></td>
        <td><?php echo $row['nombre'];?></td>
        <td><?php echo $row['edad'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['carrera_nombre'];?></td>
        </tr>
        <?php } ?>

    </tbody>
</table>