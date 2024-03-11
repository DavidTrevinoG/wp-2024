<html>
    <head>
      <title>Asignar Materia a Carrera</title>
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
            <h2>Asignar Materia a Carrera</h2>
            <form action="crud.php" method="POST">
                <div class="form-group">
                    <label for="materia">Materia</label>
                    <!-- Este campo debe ser un select con las opciones de materias -->
                    <select class="form-control" name="id_materia" required>
                        <?php
                            include 'db.php';
                            // Consulta de materias
                            $sql_materia = "SELECT * FROM materias";
                            $result_materia = $conn->query($sql_materia);
                            while ($row_materia = $result_materia->fetch_assoc()):
                        ?>
                            <option value="<?php echo $row_materia['id_materia'] ?>">
                                <?php echo $row_materia['nombre'] ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="carrera">Carrera</label>
                    <!-- Este campo debe ser un select con las opciones de carreras -->
                    <select class="form-control" name="id_carrera" required>
                        <?php
                            include 'db.php';
                            // Consulta de carreras
                            $sql_carrera = "SELECT * FROM carrera";
                            $result_carrera = $conn->query($sql_carrera);
                            while ($row_carrera = $result_carrera->fetch_assoc()):
                        ?>
                            <option value="<?php echo $row_carrera['id_carrera'] ?>">
                                <?php echo $row_carrera['nombre'] ?>
                            </option>
                        <?php endwhile ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary" name="alta_materia_carrera">Agregar materia a Carrera</button>
            </form>
        </div>
    </body>
</html>