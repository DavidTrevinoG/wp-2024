<?php

header("Pragma: public");
header("Expires: 0");
$filename = "ListadoAlumnos.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
// Conexión a la base de datos
include 'db.php';

// Consulta SQL para obtener todos los registros de la tabla alumnos
$sql = 'SELECT alumnos.id, alumnos.matricula, alumnos.nombre, alumnos.edad, alumnos.email, 
carrera.nombre as carrera_nombre FROM alumnos INNER JOIN carrera ON alumnos.id_carrera = carrera.id_carrera';
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
        <div class="container mt-5">
            <h2> Listado de Alumnos</h2>
            <table class="table">
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
                    <td>
            
                    </td>
                    </tr>
                    <?php } ?>

                </tbody>
            </table>
      
            <br>
            <br>
           
        </form>

        </div>
    </body>
</html>