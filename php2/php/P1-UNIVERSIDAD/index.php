<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Index</title>
  <!-- Incluye la biblioteca Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background: linear-gradient(to bottom, #b292e6, #DBC9F5); /* Fondo con gradiente */
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    header {
        background-color: #f2a7b0; /* Rosa pastel */
        color: #fff;
        text-align: center;
        padding: 10px;
    }

    .navbar {
        background-color: #F9D3E3; /* Rosa pastel más claro */
        position: fixed; /* Ajuste para que el navbar se quede en la parte superior */
        width: 100%; /* Hace que el navbar ocupe el ancho completo */
        top: 0; /* Lo coloca en la parte superior de la página */
    }

    .navbar-nav .nav-link {
        color: #721c24; /* Rojo oscuro para resaltar en el rosa pastel */
    }

    .navbar-toggler-icon {
        background-color: #721c24; /* Color de icono del botón de navegación */
    }

    section {
        padding: 20px;
        margin-top: 70px; 
    }
  
</style>

</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
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
 
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
