<?php 

// Conexión a la base de datos
include '../config/db.php';

// Consulta SQL para obtener todos los registros de la tabla alumnos
$sql = 'SELECT * FROM carrera';
$result = $conn->query($sql);

?>
<html lang="es">
    <head>
        <title>Listado de Carreras y Alumnos</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container mt-5">
            <h2> Listado de carreras</h2>   
            <table class="table" id="table">
            <thead>
                <th>ID Carrera</th>
                <th>Nombre</th>
            </thead>
    <tbody>
        <?php 

            // Recorrido en la tabla de carreras para obtener los registros
            while ($row = $result->fetch_assoc()){
        ?>
        <tr>
        <td><?php echo $row['id_carrera']; ?></td>
        <td><?php echo $row['nombre'];?></td>
        </tr>
        <?php } ?>

    </tbody>
            </table>
            </div>
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
            </thead>
            <tbody>
                <?php 

                    $sql = 'SELECT alumnos.id, alumnos.matricula, alumnos.nombre, alumnos.edad, alumnos.email, 
                    carrera.nombre as carrera_nombre FROM alumnos INNER JOIN carrera ON alumnos.id_carrera = carrera.id_carrera';
                    $result = $conn->query($sql);

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
           
        </div>
        <div class="container mt-5">
            <h2> Listado de Materias</h2>
            <table class="table" id="table">
                <thead>
                    <th>ID Materia</th>
                    <th>Nombre</th>
                    <th>Unidades</th>
                </thead>
                <tbody>
                    <?php 
                        // Recorrido en la tabla de materias para obtener los registros
                        $sql = 'SELECT * FROM materias';
                        $result = $conn->query($sql);
                        while ($row = $result->fetch_assoc()){ 
                    ?>
                    <tr>
                    <td><?php echo $row['id_materia']; ?></td>
                    <td><?php echo $row['nombre'];?></td>
                    <td><?php echo $row['unidades'];?></td>
        
                
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
            <a href="../models/exportar_ac.php" class="btn btn-success">Exportar</a>
            <a href="../index.php" class="btn btn-primary">Regresar</a>
        </div>
        
</table>



</html>