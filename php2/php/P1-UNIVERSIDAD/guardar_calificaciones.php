<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id_alumno = $_GET['id'];

    // Consulta para obtener el nombre del alumno
    $sql_nombre_alumno = "SELECT nombre FROM alumnos WHERE id = $id_alumno";
    $result_nombre_alumno = $conn->query($sql_nombre_alumno);
    $row_nombre_alumno = $result_nombre_alumno->fetch_assoc();
    $nombre_alumno = $row_nombre_alumno['nombre'];

    // Consulta para obtener las materias del alumno
    $sql_materias_alumno = "SELECT materias.id_materia, materias.nombre
                            FROM materias
                            INNER JOIN alumnos_materias ON materias.id_materia = alumnos_materias.id_materia
                            WHERE alumnos_materias.id_alumno = $id_alumno";
    $result_materias_alumno = $conn->query($sql_materias_alumno);
?>

<html lang="es">
<head>
    <title>Guardar Calificaciones - <?= $nombre_alumno ?></title>
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
        <h2>Guardar Calificaciones - <?= $nombre_alumno ?></h2>
        <form action="crud.php?id=<?= $id_alumno ?>" method="POST">
            <?php while ($row_materia = $result_materias_alumno->fetch_assoc()): ?>
                <div class="form-group">
                    <label for="unidad1"><?= $row_materia['nombre'] ?> - Unidad 1</label>
                    <input type="text" class="form-control" name="calif_<?= $row_materia['id_materia'] ?>-1" required>
                </div>
                <div class="form-group">
                    <label for="unidad2"><?= $row_materia['nombre'] ?> - Unidad 2</label>
                    <input type="text" class="form-control" name="calif_<?= $row_materia['id_materia'] ?>-2" required>
                </div>
                <div class="form-group">
                    <label for="unidad3"><?= $row_materia['nombre'] ?> - Unidad 3</label>
                    <input type="text" class="form-control" name="calif_<?= $row_materia['id_materia'] ?>-3" required>
                </div>
            <?php endwhile; ?>
            <button type="submit" class="btn btn-primary" name="guardar_calificaciones">Guardar</button>
        </form>
    </div>
</body>
</html>

<?php
} else {
    echo "ID de alumno no válido";
}
?>
