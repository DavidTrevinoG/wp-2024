<html>
<head>
    <title>Asignar Materias a Alumnos</title>
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
        <h2>Asignar Materias a Alumnos</h2>
        <form action="crud.php" method="POST">
            <!-- Consulta para obtener todos los alumnos -->
            <?php
                include 'db.php';
                
                $sql_alumnos = "SELECT * FROM alumnos";
                $result_alumnos = $conn->query($sql_alumnos);
            ?>
            <div class="form-group">
                <label for="alumno">Alumno</label>
                <select class="form-control" name="id_alumno" required>
                    <?php while ($row_alumno = $result_alumnos->fetch_assoc()): ?>
                        <option value="<?= $row_alumno['id'] ?>">
                            <?= $row_alumno['nombre'] ?>
                        </option>
                    <?php endwhile ?>
                </select>
            </div>

            <!-- Consulta para obtener todas las materias -->
            <?php
                $sql_materias = "SELECT * FROM materias";
                $result_materias = $conn->query($sql_materias);
            ?>
            <div class="form-group">
                <label>Materias</label>
                <?php while ($row_materia = $result_materias->fetch_assoc()): ?>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="materias[]" value="<?php echo $row_materia['id_materia'] ?>">
                        <label class="form-check-label">
                            <?php echo $row_materia['nombre'] ?>
                        </label>
                    </div>
                <?php endwhile ?>
            </div>

            <button type="submit" class="btn btn-primary" name="asignar_materias_alumno">Asignar Materias</button>
        </form>
    </div>
</body>
</html>