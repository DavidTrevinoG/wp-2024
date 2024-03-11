<?php
    //integramos el archivo de conexión a la base de datos
    include 'db.php';
    //hacemos la consulta para obtener los registros de la tabla carreras
    $sql = "SELECT * FROM materias";
    $result = $conn->query($sql);
?>

<html lang="es">
    <head>
        <title>Listado de Materias</title>
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
            <h2>Listado de Materias</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = $result->fetch_assoc()){

                    ?>
                    <tr>
                        <td><?php echo $row['id_materia']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                        <td>
                            <!-- el get se representa con el signo de "?" y el nombre de la variable-->
                            <a href="editar_materia.php?id_materia=<?=$row['id_materia']?>" class="btn btn-primary">Editar</a>
                            <form class="d-inline" action="crud.php?eliminar_materia=<?= $row['id_materia'] ?>" method="POST">
                                <input type="hidden" name="id_materia" value="<?= $row['id_materia'] ?>">
                                <button type="submit" class="btn btn-danger" name="eliminar_materia">Eliminar</button>
                            </form>
                            <a href="asignar_materia_carrera.php" class="btn btn-secondary">Asignar Materia a Carrera</button>
                        </td>
                    </tr>
                    <?php
                      }
                    ?>
                </tbody>
            </table>
            <a href="alta_materia.php" class="btn btn-success">Agregar Materia</a>
            <a href="exportar_materias.php" class="btn btn-info">Exportar a Excel</a>
            <br>
            <br>
  
        </div>
    </body>
</html>