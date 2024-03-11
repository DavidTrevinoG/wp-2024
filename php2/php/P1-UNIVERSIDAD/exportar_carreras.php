<?php

header("Pragma: public");
header("Expires: 0");
$filename = "ListadoCarreras.xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    //integramos el archivo de conexión a la base de datos
    include 'db.php';

   

    //hacemos la consulta para obtener los registros de la tabla carreras
    $sql = "SELECT * FROM carrera";
    $result = $conn->query($sql);
?>

<html lang="es">
    <head>
        <title>Listado de Carreras</title>
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
            <h2>Listado de Carreras</h2>
            <!--<a href="alta_carrera.php" class="btn btn-primary">Agregar Carrera</a>-->
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($row = $result->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $row['id_carrera']; ?></td>
                        <td><?php echo $row['nombre']; ?></td>
                    </tr>
                    <?php
                      }
                    ?>
                </tbody>
            </table>
  
        </div>
    </body>
</html>