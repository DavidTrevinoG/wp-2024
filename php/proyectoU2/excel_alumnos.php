<?php
header("Pragma: public");
header("Expires: 0");
$filename = "listadoAlumnos.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");

    //Conexión a la base de datos
    include 'bd.php';

    // Consulta para obtener todos los alumnos
    $sql = "SELECT a.id as id, a.matricula as matricula, a.nombre as nombre, a.correo as correo, c.nombre as carrera, t.nombre as tutor FROM alumno as a INNER JOIN carrera as c ON a.id_carrera = c.id INNER JOIN tutor as t ON a.id_tutor = t.id";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Alumnos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
<style>
        body {
            background-size: 100%;
    
            background-image: url('pexel.jpg');
      
            background-repeat: no-repeat;
           
            background-position: center;
        
            background-size: cover;
        
            background-color: #f0f0f0; /
        }
    </style>
    <style>

        .container {
            background-color: rgba(255, 255, 255, 0.9); 
            padding: 30px; 
        }
    </style>

    <div class="container mt-5">
        <h2>Listado de Alumnos</h2>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Carrera</th>
                    <th>Tutor</th>
       
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['matricula'] ?></td>
                        <td><?= $row['nombre'] ?></td>
                        <td><?= $row['correo'] ?></td>
                        <td><?= $row['carrera'] ?></td>
                        <td><?= $row['tutor'] ?></td>
                    
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>