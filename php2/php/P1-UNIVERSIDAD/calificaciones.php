<?php

// Conexión a la base de datos
include 'db.php';

// Consulta SQL para obtener todos los registros de la tabla alumnos
$sql = 'SELECT alumnos.id, alumnos.matricula, alumnos.nombre, alumnos.edad, alumnos.email, 
        carrera.nombre as carrera_nombre 
        FROM alumnos 
        INNER JOIN carrera ON alumnos.id_carrera = carrera.id_carrera';
$result = $conn->query($sql);
?>

<html lang="es">
<head>
    <title>Listado de Alumnos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

    <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #f2a7b0; /* Rosa pastel */
      color: #fff;
      text-align: center;
      padding: 10px;
    }

    .navbar {
      background-color: #f8d7da; /* Rosa pastel más claro */
    }

    .navbar-nav .nav-link {
      color: #721c24; /* Rojo oscuro para resaltar en el rosa pastel */
    }

    .navbar-toggler-icon {
      background-color: #721c24; /* Color de icono del botón de navegación */
    }

    section {
      padding: 20px;
    }

  </style>    
</head>
<body>

<!-- nav bar en  bootstrap-->
<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Index</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listado_alumnos.php">Listado alumnos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listado_carreras.php">Listado carreras</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="listado_materias.php">Listado materias</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="asignar_materia_alumno.php">Asignar Materia Alumno</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="asignar_materia_carrera.php">Asignar Materia Carrera</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="calificaciones.php">Calificaciones</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  
    <div class="container mt-5">
        <h2>Listado de Alumnos</h2>
        <table class="table">
            <thead>
                <th>ID Alumno</th>
                <th>Matrícula</th>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Email</th>
                <th>Carrera</th>
                <th>Materias</th>
                <th>Acción</th>
            </thead>
            <tbody>
                <?php 
                    // Recorrido en la tabla de alumnos para obtener los registros
                    while ($row = $result->fetch_assoc()): 
                        // Obtener las materias asociadas a este alumno
                        $id_alumno = $row['id'];
                        $sql_materias_alumno = "SELECT materias.nombre
                                                FROM materias
                                                INNER JOIN alumnos_materias ON materias.id_materia = alumnos_materias.id_materia
                                                WHERE alumnos_materias.id_alumno = $id_alumno";
                        $result_materias_alumno = $conn->query($sql_materias_alumno);

                        // Almacenar las materias en un array
                        $materias = [];
                        while ($row_materia = $result_materias_alumno->fetch_assoc()) {
                            $materias[] = $row_materia['nombre'];
                        }
                ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['matricula']; ?></td>
                    <td><?= $row['nombre']; ?></td>
                    <td><?= $row['edad']; ?></td>
                    <td><?= $row['email']; ?></td>
                    <td><?= $row['carrera_nombre']; ?></td>
                    <td>
                        <?php 
                            // Mostrar las materias separadas por coma
                            echo implode(', ', $materias);
                        ?>
                    </td>
                    <td>
                        <!-- Enlace para ir a guardar_calificaciones.php -->
                        <a href="guardar_calificaciones.php?id=<?= $row['id']; ?>" class="btn btn-primary">Calificaciones</a>                    
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>