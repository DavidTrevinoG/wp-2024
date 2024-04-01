<?php
    //Conexión a la base de datos
    include 'bd.php';

    // Consulta para obtener tutorias
    $sql = "SELECT t.id, c.nombre as carrera, m.nombre as materia, a.nombre as alumno, tu.nombre as tutor, observaciones, fecha FROM tutoria as t INNER JOIN carrera as c ON t.id_carrera = c.id INNER JOIN materia as m ON t.id_materia = m.id INNER JOIN alumno as a ON t.id_alumno = a.id INNER JOIN tutor as tu ON t.id_tutor = tu.id";
    $result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Tutorías</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>
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
<body>
    <?php include 'menu.php'; ?>
    <div class="container mt-5">
        <h2>Listado de Tutorías</h2>
        <div class="mb-3">
            <a href="alta_tutoria.php" class="btn btn-success mb-3">Agregar Tutoría</a>
            <a href="excel_tutoria.php" class="btn btn-success mb-3">Exportar .xslx</a>
        </div>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Carrera</th>
                    <th>Materia</th>
                    <th>Alumno</th>
                    <th>Tutor</th>
                    <th>Observaciones</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['carrera'] ?></td>
                        <td><?= $row['materia'] ?></td>
                        <td><?= $row['alumno'] ?></td>
                        <td><?= $row['tutor'] ?></td>
                        <td><?= $row['observaciones'] ?></td>
                        <td><?= $row['fecha']?></td>
                        <td>
                            <a href="editar_tutoria.php?id=<?= $row['id'] ?>" class="btn btn-primary">Editar</a>
                            <br>
                            <br>
                            <form class="d-inline-block" action="crud.php?baja_tutoria=<?= $row['id'] ?>" method="post">
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>