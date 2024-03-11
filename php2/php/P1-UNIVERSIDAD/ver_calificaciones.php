<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id_alumno = $_GET['id'];

    // Consulta para obtener el nombre del alumno
    $sql_nombre_alumno = "SELECT nombre FROM alumnos WHERE id = $id_alumno";
    $result_nombre_alumno = $conn->query($sql_nombre_alumno);
    $row_nombre_alumno = $result_nombre_alumno->fetch_assoc();
    $nombre_alumno = $row_nombre_alumno['nombre'];

    // Consulta para obtener las calificaciones del alumno
    $sql_calificaciones = "SELECT materias.nombre AS materia, calificaciones.u1, calificaciones.u2, calificaciones.u3, calificaciones.promedio
                           FROM calificaciones
                           INNER JOIN materias ON calificaciones.id_materia = materias.id_materia
                           WHERE calificaciones.id_alumno = $id_alumno";
    $result_calificaciones = $conn->query($sql_calificaciones);
?>

<html lang="es">
<head>
    <title>Calificaciones de <?= $nombre_alumno ?></title>
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
        <h2>Calificaciones de <?= $nombre_alumno ?></h2>
        <table class="table">
            <thead>
                <th>Materia</th>
                <th>Unidad 1</th>
                <th>Unidad 2</th>
                <th>Unidad 3</th>
                <th>Promedio</th>
            </thead>
            <tbody>
                <?php while ($row = $result_calificaciones->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['materia']; ?></td>
                    <td><?= $row['u1']; ?></td>
                    <td><?= $row['u2']; ?></td>
                    <td><?= $row['u3']; ?></td>
                    <td><?= $row['promedio']; ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="listado_alumnos.php" class="btn btn-primary">Regresar</a>
        <a href="exportar_calificaciones.php?id=<?= $id_alumno ?>" class="btn btn-success">Exportar a Excel</a>
    </div>
</body>
</html>

<?php
} else {
    echo "ID de alumno no vÃ¡lido";
}
?>